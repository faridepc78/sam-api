<?php

namespace App\Http\Requests\Api\V1\Admin\Space;

use App\Rules\ValidationUser;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSpaceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'unit' => ['nullable', 'numeric'],
            'standard_capacity' => ['nullable', 'numeric'],
            'extra_capacity' => ['nullable', 'numeric'],
            'prices' => ['nullable', 'array'],
            'prices.*.normal_days' => ['required', 'numeric'],
            'prices.*.weekends_days' => ['required', 'numeric'],
            'prices.*.peak_days' => ['required', 'numeric'],
            'prices.*.eid_days' => ['required', 'numeric'],
            'responsible_id' => ['nullable', 'exists:users,id', new ValidationUser()],
            'address' => ['nullable', 'string', 'max:5000'],
            'description' => ['nullable', 'string', 'max:8000'],
        ];
    }
}
