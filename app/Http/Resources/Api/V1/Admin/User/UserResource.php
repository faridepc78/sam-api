<?php

namespace App\Http\Resources\Api\V1\Admin\User;

use App\Http\Resources\Api\V1\Admin\Role\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'province' => $this->province,
            'city' => $this->city,
            'address' => $this->address,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'role' => $this->whenLoaded('roles', function () {
                return RoleResource::make($this->roles[0]);
            }),
            'author' => $this->whenLoaded('author', function () {
                return UserResource::make($this->author);
            }),
        ];
    }
}
