<?php

namespace App\Models;

use App\Enums\OrderTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];
    protected $fillable =
        [
            'author_id',
            'guest_id',
            'space_id',
            'unit',
            'checkin',
            'checkout',
            'guests',
            'prices',
            'special_services',
            'type',
            'description',
        ];

    protected $casts =
        [
            'guests' => 'array',
            'prices' => 'array',
            'special_services' => 'array',
            'type' => OrderTypeEnum::class,
        ];

    public static function types(): array
    {
        return
            [
                OrderTypeEnum::SHAB->value,
                OrderTypeEnum::JAJIGA->value,
                OrderTypeEnum::OTAGHAK->value,
                OrderTypeEnum::LIDOMATRIP->value,
                OrderTypeEnum::HOMSA->value,
                OrderTypeEnum::ROOMTOOR->value,
                OrderTypeEnum::PINOREST->value,
                OrderTypeEnum::SEPANJA->value,
                OrderTypeEnum::SAM->value,
                OrderTypeEnum::PHONE->value,
                OrderTypeEnum::OTHERS->value,
            ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function guest(): BelongsTo
    {
        return $this->belongsTo(User::class, 'guest_id');
    }

    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class, 'space_id');
    }

    public function getTotalPricesAttribute(): int
    {
        return $this->prices['site_price']
            + $this->prices['extra_price']
            + $this->prices['location_price'];
    }

    public function getTotalNightsAttribute(): int
    {
        $checkout = Carbon::createFromFormat('Y-m-d', $this->checkout);
        $checkin = Carbon::createFromFormat('Y-m-d', $this->checkin);
        return $checkout->diffInDays($checkin);
    }

    public function getTotalGuestsAttribute(): int
    {
        return $this->guests['adult']
            + $this->guests['child'];
    }

    public function getTotalEmptyNightsAttribute(): int
    {
        return $this->unit * 365 - $this->unit * $this->getTotalNightsAttribute();
    }
}
