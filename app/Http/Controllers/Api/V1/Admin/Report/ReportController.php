<?php

namespace App\Http\Controllers\Api\V1\Admin\Report;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Admin\Report\ReportResource;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ReportController extends Controller
{
    public function __construct(protected array $mostCountByType = [],
                                protected int   $totalPrices = 0,
                                protected int   $totalNights = 0,
                                protected int   $totalGuests = 0,
                                protected int   $totalEmptyNights = 0,
                                protected int   $chunkSize = 100)
    {
    }

    public function index(Request $request)
    {
        $this->authorize('report', Order::class);

        $request->validate([
            'filter.month' => ['required', 'numeric', 'between:1,120']
        ]);

        $this->mostCountByTypeMethod();

        $this->totalDataArrayMethod();

        return $this->success_response(ReportResource::make($this->makeDataStructure()),
            'show orders report in admin panel');
    }

    protected function mostCountByTypeMethod()
    {
        return $this->mostCountByType = QueryBuilder::for(Order::class)
            ->allowedFilters([
                AllowedFilter::callback('month', function (Builder $query, $value) {
                    $query->where('created_at', '>=', now()->subMonths($value));
                }),
            ])
            ->select('type', DB::raw('count(*) as total'))
            ->groupBy('type')
            ->orderBy('total', 'DESC')
            ->first()
            ->toArray();
    }

    protected function totalDataArrayMethod()
    {
        QueryBuilder::for(Order::class)
            ->allowedFilters([
                AllowedFilter::callback('month', function (Builder $query, $value) {
                    $query->where('created_at', '>=', now()->subMonths($value));
                }),
            ])
            ->chunk($this->chunkSize, function ($orders) {
                $this->totalPrices += $orders->sum('total_prices');
                $this->totalNights += $orders->sum('total_nights');
                $this->totalGuests += $orders->sum('total_guests');
                $this->totalEmptyNights += $orders->sum('total_empty_nights');
            });
    }

    protected function makeDataStructure()
    {
        return [
            'total_prices' => $this->totalPrices,
            'total_nights' => $this->totalNights,
            'total_guests' => $this->totalGuests,
            'total_empty_nights' => $this->totalEmptyNights,
            'most_common_type' => [
                'type' => $this->mostCountByType['type'],
                'total' => $this->mostCountByType['total'],
            ],
        ];
    }
}
