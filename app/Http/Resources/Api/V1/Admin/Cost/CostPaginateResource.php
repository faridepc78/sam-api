<?php

namespace App\Http\Resources\Api\V1\Admin\Cost;


use Illuminate\Http\Resources\Json\ResourceCollection;

class CostPaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'list of Cost of HRM',
            'code' => 200,
            'data' => $this->collection->map(function ($item) {

                return [
                    'id' => $item->id,
                    'clerk_id' => $item->clerk_id,
                    'title' => $item->title,
                    'counter' => $item->counter,
                    'price' => $item->price,
                    'description' => $item->description,
                    'expiration_date' => $item->expiration_date,
                    'clerk'=>$item->clerk,
                    'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $item->updated_at->format('Y-m-d H:i:s')
                ];
            })
        ];
    }
}
