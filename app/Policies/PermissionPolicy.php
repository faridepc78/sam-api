<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_READ_PERMISSIONS))
            return true;
    }
}
