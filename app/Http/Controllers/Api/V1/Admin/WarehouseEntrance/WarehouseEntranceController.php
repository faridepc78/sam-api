<?php

namespace App\Http\Controllers\Api\V1\Admin\WarehouseEntrance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\WarehouseEntrance\CreateWarehouseEntranceRequest;
use App\Http\Requests\Api\V1\Admin\WarehouseEntrance\UpdateWarehouseEntranceRequest;
use App\Http\Resources\Api\V1\Admin\WarehouseEntrance\WarehouseEntrancePaginateResource;
use App\Http\Resources\Api\V1\Admin\WarehouseEntrance\WarehouseEntranceResource;
use App\Models\WarehouseEntrance;
use Illuminate\Http\Request;


class WarehouseEntranceController extends Controller
{
    public function index(Request $request)
    {
       // $this->authorize('index', WarehouseEntrance::class);

        $WarehouseEntrances = WarehouseEntrance::query()
            ->latest()
            ->paginate($request->input('per_page', 10));

        return new WarehouseEntrancePaginateResource($WarehouseEntrances);
    }

    public function store(CreateWarehouseEntranceRequest $request)
    {
      //  $this->authorize('store', WarehouseEntrance::class);

        $WarehouseEntrance = WarehouseEntrance::query()
            ->create(filterNullData($request->validationData()));

        return $this->success_response(new WarehouseEntranceResource($WarehouseEntrance),
            'WarehouseEntrance has been successfully created');
    }

    public function show(WarehouseEntrance $WarehouseEntrance)
    {
       // $this->authorize('show', WarehouseEntrance::class);

        return $this->success_response
        (WarehouseEntranceResource::make($WarehouseEntrance),
            'show WarehouseEntrance information in admin panel');
    }

    public function update(UpdateWarehouseEntranceRequest $request, WarehouseEntrance $WarehouseEntrance)
    {
        //   $this->authorize('update', WarehouseEntrance::class);

        $WarehouseEntrance->update(filterNullData($request->all()));



        return $this->success_response(new WarehouseEntranceResource($WarehouseEntrance),
            'WarehouseEntrance has been successfully updated');
    }

    public function destroy(WarehouseEntrance $WarehouseEntrance)
    {
      //  $this->authorize('destroy', WarehouseEntrance::class);

        $WarehouseEntrance->delete();

        return $this->success_response
        (null, 'WarehouseEntrance has been successfully deleted');
    }
}
