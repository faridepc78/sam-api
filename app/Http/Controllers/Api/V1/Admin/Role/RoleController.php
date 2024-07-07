<?php

namespace App\Http\Controllers\Api\V1\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Api\V1\Admin\Role\UpdateRoleRequest;
use App\Http\Resources\Api\V1\Admin\Role\RoleResource;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('index', Role::class);

        $roles = Role::query()
            ->with('permissions')
            ->get();

        return $this->success_response(RoleResource::collection($roles),
            'show all of roles in admin panel');
    }

    public function store(StoreRoleRequest $request)
    {
        $this->authorize('store', Role::class);

        $role = Role::query()
            ->create($request->except('permissions'))
            ->syncPermissions($request->input('permissions'));

        return $this->success_response(
            RoleResource::make($role->load('permissions')),
            'role created successfully', 201);
    }

    public function show(Role $role)
    {
        $this->authorize('show', Role::class);

        return $this->success_response(
            RoleResource::make($role->load('permissions')),
            'show role information in admin panel');
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->authorize('update', Role::class);

        $role->syncPermissions($request->only('permissions'))
            ->update($request->except('permissions'));

        return $this->success_response(
            RoleResource::make($role->refresh()
                ->load('permissions')),
            'role updated successfully');
    }

    public function destroy(Role $role)
    {
        $this->authorize('destroy', Role::class);

        $role->delete();

        return $this->success_response(null,
            'role deleted successfully');
    }
}
