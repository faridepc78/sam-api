<?php

namespace App\Http\Requests\Api\V1\Admin\Clerk;

use App\Models\Clerk;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateClerkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        return [
            'space_id' => ['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255', 'unique:clerks,code'],
            'gender' => ['nullable', 'string'],
            'shift_work' => ['nullable', 'string'],
            'mobile' => ['required', 'string'],
            'organizational_unit' => ['nullable', 'string'],
            'monthly_salary' => ['nullable', 'string'],
            'monthly_daily' => ['nullable', 'string'],
            'reward' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'bank_account' => ['nullable', 'string'],
            'bank_sheba' => ['nullable', 'string'],
            'bank_number' => ['nullable', 'string'],
            'bank_name' => ['nullable', 'string'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:2048'],
            'status' => ['required', Rule::in(Clerk::$statuses)]
        ];
    }
}
