<?php

namespace App\Http\Resources\Api\V1\Admin\Space;

use App\Http\Resources\Api\V1\Admin\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SpaceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'unit' => $this->unit,
            'standard_capacity' => $this->standard_capacity,
            'extra_capacity' => $this->extra_capacity,
            'prices' => $this->prices,
            'description' => $this->description,
            'address' => $this->address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'author' => $this->whenLoaded('author', function () {
                return UserResource::make($this->author);
            }),
            'responsible' => $this->whenLoaded('responsible', function () {
                return UserResource::make($this->responsible);
            }),
        ];
    }
}
