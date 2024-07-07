<?php

namespace App\Http\Requests\Api\V1\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'guard_name' => 'web',
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:roles,name'],
            'permissions' => ['required', 'array', 'min:1'],
            'permissions.*' => ['size:1'],
            'permissions.*.name' => ['required', 'string', 'max:255', 'exists:permissions,name'],
        ];
    }
}
