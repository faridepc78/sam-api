<?php

namespace App\Http\Resources\Api\V1\Admin\WarehouseExit;

use App\Http\Resources\Api\V1\Admin\User\UserResource;
use App\Models\WarehouseExit;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;

class WarehouseExitResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'space_id' => $this->space_id,
           // 'category_id' => $this->category_id,
            'clerk_id' => $this->clerk_id,
            'warehouse_entrance_id' => $this->warehouse_entrance_id,
            'title' => $this->title,
            'counter' => $this->counter,
            'price' => $this->price,
            'description' => $this->description,
            'expiration_date' => $this->expiration_date,
            'clerk'=>$this->clerk,
            'category'=>$this->category,
            'space'=>$this->space,
            'warehouse_entrance'=>$this->warehouseEntrance,
            /*  'image' => [
                  'id' => $this->image->id,
                  'path' => $this->image->original
              ],*/
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
