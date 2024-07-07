<?php

namespace App\Http\Controllers\Api\V1\Admin\Repair;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\Repair\CreateRepairRequest;
use App\Http\Requests\Api\V1\Admin\Repair\UpdateRepairRequest;
use App\Http\Resources\Api\V1\Admin\Repair\RepairPaginateResource;
use App\Http\Resources\Api\V1\Admin\Repair\RepairResource;
use App\Models\Repair;
use Illuminate\Http\Request;


class RepairController extends Controller
{
    public function index(Request $request)
    {
       // $this->authorize('index', Repair::class);

        $Repairs = Repair::query()
            ->latest()
            ->paginate($request->input('per_page', 10));

        return new RepairPaginateResource($Repairs);
    }

    public function store(CreateRepairRequest $request)
    {
      //  $this->authorize('store', Repair::class);

        $Repair = Repair::query()
            ->create(filterNullData($request->validationData()));

        return $this->success_response(new RepairResource($Repair),
            'Repair has been successfully created');
    }

    public function show(Repair $Repair)
    {
       // $this->authorize('show', Repair::class);

        return $this->success_response
        (RepairResource::make($Repair),
            'show Repair information in admin panel');
    }

    public function update(UpdateRepairRequest $request, Repair $Repair)
    {
        //   $this->authorize('update', Repair::class);

        $Repair->update(filterNullData($request->all()));



        return $this->success_response(new RepairResource($Repair),
            'Repair has been successfully updated');
    }

    public function destroy(Repair $Repair)
    {
      //  $this->authorize('destroy', Repair::class);

        $Repair->delete();

        return $this->success_response
        (null, 'Repair has been successfully deleted');
    }
}
