<?php

namespace App\Http\Requests\Api\V1\Admin\Clerk;

use App\Models\Clerk;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClerkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        $id = request()->clerk->id;

        return [
            'space_id' => ['nullable'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            //'code' => ['required', 'string', 'max:255', 'unique:clerks,code'],
            'gender' => ['nullable', 'string'],
            'shift_work' => ['nullable', 'string'],
            'mobile' => ['nullable', 'string'],
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
            'status' => ['nullable', Rule::in(Clerk::$statuses)]
        ];
    }
}
