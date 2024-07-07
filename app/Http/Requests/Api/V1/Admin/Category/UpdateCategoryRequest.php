<?php

namespace App\Http\Requests\Api\V1\Admin\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        $id = request()->category->id;

        return [
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', Rule::in(Category::$statuses)]
        ];
    }
}
