<?php

namespace App\Http\Resources\Api\V1\Admin\Role;

use App\Http\Resources\Api\V1\Admin\Permission\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'guard_name' => $this->guard_name,
            'permissions' => $this->whenLoaded('permissions', function () {
                return PermissionResource::collection($this->permissions);
            }),
        ];
    }
}
