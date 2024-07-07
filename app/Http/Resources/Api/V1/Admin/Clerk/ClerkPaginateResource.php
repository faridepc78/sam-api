<?php

namespace App\Http\Resources\Api\V1\Admin\Clerk;


use Illuminate\Http\Resources\Json\ResourceCollection;

class ClerkPaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'list of Clerks of HRM',
            'code' => 200,
            'data' => $this->collection->map(function ($item) {

                return [
                    'id' => $item->id,
                    'space_id' => $item->space_id,
                    'first_name' => $item->first_name,
                    'last_name' => $item->last_name,
                    'code' => $item->code,
                    'gender' => $item->gender,
                    'shift_work' => $item->shift_work,
                    'mobile' => $item->mobile,
                    'organizational_unit' => $item->organizational_unit,
                    'monthly_salary' => $item->monthly_salary,
                    'monthly_daily' => $item->monthly_daily,
                    'reward' => $item->reward,
                    'address' => $item->address,
                    'description' => $item->description,
                    'bank_account' => $item->bank_account,
                    'bank_sheba' => $item->bank_sheba,
                    'bank_number' => $item->bank_number,
                    'bank_name' => $item->bank_name,
                    'status' => $item->status,
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
