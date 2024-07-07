<?php

namespace App\Http\Resources\Api\V1\Admin\Repair;


use Illuminate\Http\Resources\Json\ResourceCollection;

class RepairPaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'list of Repair of HRM',
            'code' => 200,
            'data' => $this->collection->map(function ($item) {

                return [
                    'id' => $item->id,
                    'space_id' => $item->space_id,
                    'clerk_id' => $item->clerk_id,
                    'title' => $item->title,
                    'code' => $item->code,
                    'price' => $item->price,
                    'description' => $item->description,
                    'expiration_date' => $item->expiration_date,
                    'status'=>$item->status,
                    'clerk'=>$item->clerk,
                    'space'=>$item->space,

                    'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $item->updated_at->format('Y-m-d H:i:s')
                ];
            })
        ];
    }
}
