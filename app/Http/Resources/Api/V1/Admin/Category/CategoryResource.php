<?php

namespace App\Http\Resources\Api\V1\Admin\Category;

use App\Http\Resources\Api\V1\Admin\User\UserResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
