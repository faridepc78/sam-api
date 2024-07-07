<?php

namespace App\Http\Resources\Api\V1\Admin\Fee;

use App\Http\Resources\Api\V1\Admin\User\UserResource;
use App\Models\Clerk;
use App\Models\Fee;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;

class FeeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'fee' => $this->fee,
            'date_fee' =>$this->date_fee,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
