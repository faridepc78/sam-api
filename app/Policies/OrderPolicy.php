<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_READ_ORDERS))
            return true;
    }

    public function store(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_CREATE_ORDERS))
            return true;
    }

    public function show(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_READ_ORDERS))
            return true;
    }

    public function update(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_UPDATE_ORDERS))
            return true;
    }

    public function destroy(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_DELETE_ORDERS))
            return true;
    }

    public function report(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_MANAGEMENT_STATISTICS))
            return true;
    }
}
