<?php

namespace App\Http\Controllers\Api\V1\Admin\Clerk;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\Clerk\CreateClerkRequest;
use App\Http\Requests\Api\V1\Admin\Clerk\UpdateClerkRequest;
use App\Http\Resources\Api\V1\Admin\Clerk\ClerkPaginateResource;
use App\Http\Resources\Api\V1\Admin\Clerk\ClerkResource;
use App\Models\Clerk;
use Illuminate\Http\Request;


class ClerkController extends Controller
{
    public function index(Request $request)
    {
       // $this->authorize('index', Clerk::class);

        $clerks = Clerk::query()
            ->latest()
            ->paginate($request->input('per_page', 10));

        return new ClerkPaginateResource($clerks);
    }

    public function store(CreateClerkRequest $request)
    {
      //  $this->authorize('store', Clerk::class);

        $clerk = Clerk::query()
            ->create(filterNullData($request->validationData()));

        return $this->success_response(new ClerkResource($clerk),
            'clerk has been successfully created');
    }

    public function show(Clerk $clerk)
    {
       // $this->authorize('show', Clerk::class);

        return $this->success_response
        (ClerkResource::make($clerk),
            'show clerk information in admin panel');
    }

    public function update(UpdateClerkRequest $request, Clerk $clerk)
    {
        //   $this->authorize('update', Clerk::class);

        $clerk->update(filterNullData($request->all()));



        return $this->success_response(new ClerkResource($clerk),
            'clerk has been successfully updated');
    }

    public function destroy(Clerk $clerk)
    {
      //  $this->authorize('destroy', Clerk::class);

        $clerk->delete();

        return $this->success_response
        (null, 'clerk has been successfully deleted');
    }
}
