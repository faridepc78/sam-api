<?php

namespace App\Http\Requests\Api\V1\Admin\Salary;

use App\Models\Salary;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSalaryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        return [
            'clerk_id' => ['required'],
            'monthly_salary' => ['nullable', 'string'],
            'monthly_daily' => ['nullable', 'string'],
            'sms' => ['nullable', Rule::in(Salary::$sms)]
        ];
    }
}
