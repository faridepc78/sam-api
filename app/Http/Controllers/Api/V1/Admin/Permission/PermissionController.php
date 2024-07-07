<?php

namespace App\Http\Controllers\Api\V1\Admin\Permission;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Admin\Permission\PermissionResource;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('index', Permission::class);

        $permissions = Permission::all();

        return $this->success_response(
            PermissionResource::collection($permissions),
            'show all of permissions in admin panel');
    }
}
