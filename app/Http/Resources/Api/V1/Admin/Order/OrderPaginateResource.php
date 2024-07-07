<?php

namespace App\Http\Resources\Api\V1\Admin\Order;

use App\Http\Resources\Api\V1\Admin\Space\SpaceResource;
use App\Http\Resources\Api\V1\Admin\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderPaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'show all of orders by paginate in admin panel',
            'code' => 200,
            'data' => $this->collection
                ->when($request->has(['author', 'guest', 'space']), function ($collection) {
                    $collection->loadMissing(['author', 'guest', 'space']);
                })
                ->map(function ($item) {
                    $data = [
                        'id' => $item->id,
                        'unit' => $item->unit,
                        'checkin' => $item->checkin,
                        'checkout' => $item->checkout,
                        'guests' => $item->guests,
                        'prices' => $item->prices,
                        'special_services' => $item->special_services,
                        'type' => $item->type,
                        'description' => $item->description,
                        'created_at' => $item->created_at,
                        'updated_at' => $item->updated_at,
                    ];

                    if ($item->relationLoaded('author')) {
                        $data['author'] = UserResource::make($item->author);
                    }
                    if ($item->relationLoaded('guest')) {
                        $data['guest'] = UserResource::make($item->guest);
                    }
                    if ($item->relationLoaded('space')) {
                        $data['space'] = SpaceResource::make($item->space);
                    }

                    return $data;
                }),
        ];
    }
}
