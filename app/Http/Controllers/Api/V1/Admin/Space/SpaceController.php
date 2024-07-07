<?php

namespace App\Http\Controllers\Api\V1\Admin\Space;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\Space\IndexSpaceRequest;
use App\Http\Requests\Api\V1\Admin\Space\StoreSpaceRequest;
use App\Http\Requests\Api\V1\Admin\Space\UpdateSpaceRequest;
use App\Http\Resources\Api\V1\Admin\Space\SpacePaginateResource;
use App\Http\Resources\Api\V1\Admin\Space\SpaceResource;
use App\Models\Space;

class SpaceController extends Controller
{
    public function index(IndexSpaceRequest $request)
    {
        $this->authorize('index', Space::class);

        $spaces = Space::query()
            ->with(['author', 'responsible'])
            ->latest()
            ->paginate($request->input('per_page', 10));

        return new SpacePaginateResource($spaces);
    }

    public function store(StoreSpaceRequest $request)
    {
        $this->authorize('store', Space::class);

        $space = Space::query()
            ->create(filterNullData($request->validationData()));

        return $this->success_response
        (SpaceResource::make($space->load(['author', 'responsible'])),
            'space has been successfully created');
    }

    public function show(Space $space)
    {
        $this->authorize('show', Space::class);

        return $this->success_response
        (SpaceResource::make($space->load(['author', 'responsible'])),
            'show space information in admin panel');
    }

    public function update(UpdateSpaceRequest $request, Space $space)
    {
        $this->authorize('update', Space::class);

        $space->update(filterNullData($request->validated()));

        return $this->success_response
        (SpaceResource::make($space->refresh()
            ->load(['author', 'responsible'])),
            'space has been successfully updated');
    }

    public function destroy(Space $space)
    {
        $this->authorize('destroy', Space::class);

        $space->delete();

        return $this->success_response
        (null, 'space has been successfully deleted');
    }
}
