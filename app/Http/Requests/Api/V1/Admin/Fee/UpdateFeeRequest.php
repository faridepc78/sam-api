<?php

namespace App\Http\Requests\Api\V1\Admin\Fee;

use App\Models\Fee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        return [
            'fee' => ['nullable'],
            'date_fee' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ];
    }
}
