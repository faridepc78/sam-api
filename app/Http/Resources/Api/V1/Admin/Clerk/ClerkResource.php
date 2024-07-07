<?php

namespace App\Http\Resources\Api\V1\Admin\Clerk;

use App\Http\Resources\Api\V1\Admin\User\UserResource;
use App\Models\Clerk;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;

class ClerkResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'space_id' => $this->space_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'code' => $this->code,
            'gender' => $this->gender,
            'shift_work' => $this->shift_work,
            'mobile' => $this->mobile,
            'organizational_unit' => $this->organizational_unit,
            'monthly_salary' => $this->monthly_salary,
            'monthly_daily' => $this->monthly_daily,
            'reward' => $this->reward,
            'address' => $this->address,
            'description' => $this->description,
            'bank_account' => $this->bank_account,
            'bank_sheba' => $this->bank_sheba,
            'bank_number' => $this->bank_number,
            'bank_name' => $this->bank_name,
            'status' => $this->status,
            /*  'image' => [
                  'id' => $this->image->id,
                  'path' => $this->image->original
              ],*/
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
