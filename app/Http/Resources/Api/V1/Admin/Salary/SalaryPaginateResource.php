<?php

namespace App\Http\Resources\Api\V1\Admin\Salary;


use App\Models\Salary;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Validation\Rule;

class SalaryPaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'list of Salary of Salaries',
            'code' => 200,
            'data' => $this->collection->map(function ($item) {

                return [
                    'id' => $item->id,
                    'clerk_id' => $item->clerk_id,
                    'monthly_salary' =>$item->monthly_salary,
                    'monthly_daily' => $item->monthly_daily,
                    'clerk'=>$item->clerk,
                    'sms' => $item->sms,
                    'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $item->updated_at->format('Y-m-d H:i:s')
                ];
            })
        ];
    }
}
