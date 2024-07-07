<?php

namespace App\Http\Resources\Api\V1\Admin\Fee;


use App\Models\Fee;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Validation\Rule;

class FeePaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'list of Fee of Salaries',
            'code' => 200,
            'data' => $this->collection->map(function ($item) {

                return [
                    'id' => $item->id,
                    'fee' => $item->fee,
                    'date_fee' =>$item->date_fee,
                    'description' => $item->description,
                    'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $item->updated_at->format('Y-m-d H:i:s')
                ];
            })
        ];
    }
}
