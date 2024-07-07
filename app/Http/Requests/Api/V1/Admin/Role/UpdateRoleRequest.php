<?php

namespace App\Http\Requests\Api\V1\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'unique:roles,name,' . request()->role->id],
            'permissions' => ['required', 'array', 'min:1'],
            'permissions.*' => ['size:1'],
            'permissions.*.name' => ['required', 'string', 'exists:permissions,name'],
        ];
    }
}
