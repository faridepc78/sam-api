<?php

namespace App\Http\Resources\Api\V1\Admin\Repair;

use App\Models\Repair;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;

class RepairResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'space_id' => $this->space_id,
            'clerk_id' => $this->clerk_id,
            'title' => $this->title,
            'code' => $this->code,
            'price' => $this->price,
            'description' => $this->description,
            'expiration_date' => $this->expiration_date,
            'status'=>$this->status,
            'clerk'=>$this->clerk,
            'space'=>$this->space,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}