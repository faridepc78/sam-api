<?php

namespace App\Http\Requests\Api\V1\Admin\User;

use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        $id = request()->user->id;

        return [
            'name' => ['nullable', 'string', 'max:255'],
            'mobile' => ['nullable', new ValidationMobile(), 'unique:users,mobile,' . $id],
            'province' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:5000'],
            'description' => ['nullable', 'string', 'max:5000'],
            'password' => ['nullable', 'string', 'min:8', 'max:255'],
            'role' => ['nullable', 'string', 'max:255', 'exists:roles,name'],
        ];
    }
}
