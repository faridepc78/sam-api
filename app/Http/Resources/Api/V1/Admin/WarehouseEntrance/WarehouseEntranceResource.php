<?php

namespace App\Http\Resources\Api\V1\Admin\WarehouseEntrance;

use App\Http\Resources\Api\V1\Admin\User\UserResource;
use App\Models\WarehouseEntrance;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;

class WarehouseEntranceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'space_id' => $this->space_id,
            'category_id' => $this->category_id,
            'clerk_id' => $this->clerk_id,
            'title' => $this->title,
            'code' => $this->code,
            'counter' => $this->counter,
            'price' => $this->price,
            'description' => $this->description,
            'expiration_date' => $this->expiration_date,
            'clerk'=>$this->clerk,
            'category'=>$this->category,
            'space'=>$this->space,
            /*  'image' => [
                  'id' => $this->image->id,
                  'path' => $this->image->original
              ],*/
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
