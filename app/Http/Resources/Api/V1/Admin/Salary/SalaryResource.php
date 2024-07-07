<?php

namespace App\Http\Resources\Api\V1\Admin\Salary;

use App\Http\Resources\Api\V1\Admin\User\UserResource;
use App\Models\Clerk;
use App\Models\Salary;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;

class SalaryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'clerk_id' => $this->clerk_id,
            'monthly_salary' =>$this->monthly_salary,
            'monthly_daily' => $this->monthly_daily,
            'clerk'=>$this->clerk,
            'sms' => $this->sms,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
