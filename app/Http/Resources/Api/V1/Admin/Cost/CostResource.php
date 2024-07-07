<?php

namespace App\Http\Resources\Api\V1\Admin\Cost;

use App\Models\Cost;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;

class CostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'clerk_id' => $this->clerk_id,
            'title' => $this->title,
            'counter' => $this->counter,
            'price' => $this->price,
            'description' => $this->description,
            'expiration_date' => $this->expiration_date,
            'clerk'=>$this->clerk,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
