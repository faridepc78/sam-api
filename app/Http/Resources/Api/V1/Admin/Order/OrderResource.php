<?php

namespace App\Http\Resources\Api\V1\Admin\Order;

use App\Http\Resources\Api\V1\Admin\Space\SpaceResource;
use App\Http\Resources\Api\V1\Admin\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'unit' => $this->unit,
            'checkin' => $this->checkin,
            'checkout' => $this->checkout,
            'guests' => $this->guests,
            'prices' => $this->prices,
            'special_services' => $this->special_services,
            'type' => $this->type,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'author' => $this->whenLoaded('author', function () {
                return UserResource::make($this->author);
            }),
            'guest' => $this->whenLoaded('guest', function () {
                return UserResource::make($this->guest);
            }),
            'space' => $this->whenLoaded('space', function () {
                return SpaceResource::make($this->space);
            }),
        ];
    }
}
