<?php

namespace App\Http\Resources\Api\V1\Admin\WarehouseExit;


use Illuminate\Http\Resources\Json\ResourceCollection;

class WarehouseExitPaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'list of WarehouseExit of HRM',
            'code' => 200,
            'data' => $this->collection->map(function ($item) {

                return [
                    'id' => $item->id,
                    'space_id' => $item->space_id,
                   // 'category_id' => $item->category_id,
                    'clerk_id' => $item->clerk_id,
                    'warehouse_entrance_id' => $item->warehouse_entrance_id,
                    'title' => $item->title,
                    'counter' => $item->counter,
                    'price' => $item->price,
                    'description' => $item->description,
                    'expiration_date' => $item->expiration_date,
                    'clerk'=>$item->clerk,
                    'category'=>$item->category,
                    'space'=>$item->space,
                    'warehouse_entrance'=>$item->warehouseEntrance,
                  /*  'image' => [
                        'id' => $item->image->id,
                        'path' => $item->image->original
                    ],*/
                    'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $item->updated_at->format('Y-m-d H:i:s')
                ];
            })
        ];
    }
}
