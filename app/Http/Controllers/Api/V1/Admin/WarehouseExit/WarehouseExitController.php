<?php

namespace App\Http\Controllers\Api\V1\Admin\WarehouseExit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\WarehouseExit\CreateWarehouseExitRequest;
use App\Http\Requests\Api\V1\Admin\WarehouseExit\UpdateWarehouseExitRequest;
use App\Http\Resources\Api\V1\Admin\WarehouseExit\WarehouseExitPaginateResource;
use App\Http\Resources\Api\V1\Admin\WarehouseExit\WarehouseExitResource;
use App\Models\WarehouseExit;
use Illuminate\Http\Request;


class WarehouseExitController extends Controller
{
    public function index(Request $request)
    {
       // $this->authorize('index', WarehouseExit::class);

        $WarehouseExits = WarehouseExit::query()
            ->latest()
            ->paginate($request->input('per_page', 10));

        return new WarehouseExitPaginateResource($WarehouseExits);
    }

    public function store(CreateWarehouseExitRequest $request)
    {
      //  $this->authorize('store', WarehouseExit::class);

        $WarehouseExit = WarehouseExit::query()
            ->create(filterNullData($request->validationData()));

        return $this->success_response(new WarehouseExitResource($WarehouseExit),
            'WarehouseExit has been successfully created');
    }

    public function show(WarehouseExit $WarehouseExit)
    {
       // $this->authorize('show', WarehouseExit::class);

        return $this->success_response
        (WarehouseExitResource::make($WarehouseExit),
            'show WarehouseExit information in admin panel');
    }

    public function update(UpdateWarehouseExitRequest $request, WarehouseExit $WarehouseExit)
    {
        //   $this->authorize('update', WarehouseExit::class);

        $WarehouseExit->update(filterNullData($request->all()));



        return $this->success_response(new WarehouseExitResource($WarehouseExit),
            'WarehouseExit has been successfully updated');
    }

    public function destroy(WarehouseExit $WarehouseExit)
    {
      //  $this->authorize('destroy', WarehouseExit::class);

        $WarehouseExit->delete();

        return $this->success_response
        (null, 'WarehouseExit has been successfully deleted');
    }
}
