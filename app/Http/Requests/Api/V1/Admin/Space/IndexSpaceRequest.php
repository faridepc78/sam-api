<?php

namespace App\Http\Requests\Api\V1\Admin\Space;

use Illuminate\Foundation\Http\FormRequest;

class IndexSpaceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        return [
            'page' => ['nullable', 'integer', 'min:1'],
            'per_page' => ['nullable', 'integer', 'min:5', 'max:50'],
        ];
    }
}
