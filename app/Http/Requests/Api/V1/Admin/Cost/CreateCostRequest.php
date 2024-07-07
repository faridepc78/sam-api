<?php

namespace App\Http\Requests\Api\V1\Admin\Cost;

use App\Models\Cost;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        return [
            'clerk_id' => ['nullable'],
            'title' => ['nullable', 'string', 'max:255'],
            'counter' => ['nullable', 'string'],
            'price' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'expiration_date' => ['nullable', 'string'],
        ];
    }
}
