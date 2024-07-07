<?php

namespace App\Http\Resources\Api\V1\Admin\User;

use App\Http\Resources\Api\V1\Admin\Role\RoleResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserPaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'show all of users by paginate in admin panel',
            'code' => 200,
            'data' => $this->collection
                ->when($request->has(['roles', 'author']), function ($collection) {
                    $collection->loadMissing(['roles', 'author']);
                })
                ->map(function ($item) {
                    $data = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'mobile' => $item->mobile,
                        'province' => $item->province,
                        'city' => $item->city,
                        'address' => $item->address,
                        'description' => $item->description,
                        'created_at' => $item->created_at,
                        'updated_at' => $item->updated_at,
                    ];

                    if ($item->relationLoaded('roles')) {
                        $data['role'] = RoleResource::make($item->roles['0']);
                    }
                    if ($item->relationLoaded('author') && !empty($item->author)) {
                        $data['author'] = UserResource::make($item->author);
                    } else {
                        $data['author'] = null;
                    }

                    return $data;
                }),
        ];
    }
}
