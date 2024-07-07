<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_READ_USERS))
            return true;
    }

    public function store(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_CREATE_USERS))
            return true;
    }

    public function show(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_READ_USERS))
            return true;
    }

    public function update(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_UPDATE_USERS))
            return true;
    }

    public function destroy(User $user, User $target)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_DELETE_USERS)
            && $user->id != $target->id)
            return true;
    }
}
