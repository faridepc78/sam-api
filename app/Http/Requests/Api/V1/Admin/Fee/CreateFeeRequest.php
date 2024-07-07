<?php

namespace App\Http\Requests\Api\V1\Admin\Fee;

use App\Models\Fee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateFeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        return [
            'fee' => ['required'],
            'date_fee' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ];
    }
}
