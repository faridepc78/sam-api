<?php

namespace App\Http\Resources\Api\V1\Auth;

use App\Http\Resources\Api\V1\Admin\Role\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            'api_token' => $this->createToken($request->input('mobile')
                . '_api_token')->plainTextToken,
            'role' => $this->whenLoaded('roles', function () {
                return RoleResource::make($this->roles[0]);
            }),
        ];
    }
}
