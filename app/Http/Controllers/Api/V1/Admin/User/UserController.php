<?php

namespace App\Http\Controllers\Api\V1\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\User\IndexUserRequest;
use App\Http\Requests\Api\V1\Admin\User\StoreUserRequest;
use App\Http\Requests\Api\V1\Admin\User\UpdateUserRequest;
use App\Http\Resources\Api\V1\Admin\User\UserPaginateResource;
use App\Http\Resources\Api\V1\Admin\User\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index(IndexUserRequest $request)
    {
        $this->authorize('index', User::class);

        $users = User::query()
            ->with(['roles.permissions', 'author'])
            ->latest()
            ->paginate($request->input('per_page', 10));

        return new UserPaginateResource($users);
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('store', User::class);

        $user = User::query()
            ->create(filterNullData($request->validationData()));

        if ($request->filled('role'))
            $user->assignRole($request->input('role'));

        return $this->success_response
        (UserResource::make($user
            ->load(['roles.permissions', 'author'])),
            'user has been successfully created');
    }

    public function show(User $user)
    {
        $this->authorize('show', User::class);

        return $this->success_response
        (UserResource::make($user
            ->load(['roles.permissions', 'author'])),
            'user project information in admin panel');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', User::class);

        $user->update(filterNullData($request->validated()));

        $user->syncRoles($request->input('role'));

        return $this->success_response
        (UserResource::make($user->refresh()
            ->load(['roles.permissions', 'author'])),
            'user has been successfully updated');
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', [User::class, $user]);

        $user->delete();

        return $this->success_response
        (null, 'user has been successfully deleted');
    }
}
