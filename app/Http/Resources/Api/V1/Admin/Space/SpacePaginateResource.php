<?php

namespace App\Http\Resources\Api\V1\Admin\Space;

use App\Http\Resources\Api\V1\Admin\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SpacePaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'show all of spaces by paginate in admin panel',
            'code' => 200,
            'data' => $this->collection
                ->when($request->has(['responsible', 'author']), function ($collection) {
                    $collection->loadMissing(['responsible', 'author']);
                })
                ->map(function ($item) {
                    $data = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'unit' => $item->unit,
                        'standard_capacity' => $item->standard_capacity,
                        'extra_capacity' => $item->extra_capacity,
                        'prices' => $item->prices,
                        'description' => $item->description,
                        'address' => $item->address,
                        'created_at' => $item->created_at,
                        'updated_at' => $item->updated_at,
                    ];

                    if ($item->relationLoaded('author')) {
                        $data['author'] = UserResource::make($item->author);
                    }
                    if ($item->relationLoaded('responsible')) {
                        $data['responsible'] = UserResource::make($item->responsible);
                    }

                    return $data;
                }),
        ];
    }
}
