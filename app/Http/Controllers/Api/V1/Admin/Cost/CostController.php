<?php

namespace App\Http\Controllers\Api\V1\Admin\Cost;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\Cost\CreateCostRequest;
use App\Http\Requests\Api\V1\Admin\Cost\UpdateCostRequest;
use App\Http\Resources\Api\V1\Admin\Cost\CostPaginateResource;
use App\Http\Resources\Api\V1\Admin\Cost\CostResource;
use App\Models\Cost;
use Illuminate\Http\Request;


class CostController extends Controller
{
    public function index(Request $request)
    {
       // $this->authorize('index', Cost::class);

        $Costs = Cost::query()
            ->latest()
            ->paginate($request->input('per_page', 10));

        return new CostPaginateResource($Costs);
    }

    public function store(CreateCostRequest $request)
    {
      //  $this->authorize('store', Cost::class);

        $Cost = Cost::query()
            ->create(filterNullData($request->validationData()));

        return $this->success_response(new CostResource($Cost),
            'Cost has been successfully created');
    }

    public function show(Cost $Cost)
    {
       // $this->authorize('show', Cost::class);

        return $this->success_response
        (CostResource::make($Cost),
            'show Cost information in admin panel');
    }

    public function update(UpdateCostRequest $request, Cost $Cost)
    {
        //   $this->authorize('update', Cost::class);

        $Cost->update(filterNullData($request->all()));



        return $this->success_response(new CostResource($Cost),
            'Cost has been successfully updated');
    }

    public function destroy(Cost $Cost)
    {
      //  $this->authorize('destroy', Cost::class);

        $Cost->delete();

        return $this->success_response
        (null, 'Cost has been successfully deleted');
    }
}
