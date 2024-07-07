<?php

namespace App\Http\Requests\Api\V1\Admin\User;

use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'author_id' => auth()->id(),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', new ValidationMobile(), 'unique:users,mobile'],
            'province' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:5000'],
            'description' => ['nullable', 'string', 'max:5000'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'role' => ['required', 'string', 'max:255', 'exists:roles,name'],
        ];
    }
}
