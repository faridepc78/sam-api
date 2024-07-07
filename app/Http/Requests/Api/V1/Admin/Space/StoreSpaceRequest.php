<?php

namespace App\Http\Requests\Api\V1\Admin\Space;

use App\Rules\ValidationUser;
use Illuminate\Foundation\Http\FormRequest;

class StoreSpaceRequest extends FormRequest
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
            'unit' => ['required', 'numeric'],
            'standard_capacity' => ['required', 'numeric'],
            'extra_capacity' => ['required', 'numeric'],
            'prices' => ['required', 'array'],
            'prices.*.normal_days' => ['required', 'numeric'],
            'prices.*.weekends_days' => ['required', 'numeric'],
            'prices.*.peak_days' => ['required', 'numeric'],
            'prices.*.eid_days' => ['required', 'numeric'],
           // 'responsible_id' => ['required', 'exists:users,id', new ValidationUser()],
            'responsible_id' => ['required', 'exists:users,id'],
            'address' => ['nullable', 'string', 'max:5000'],
            'description' => ['nullable', 'string', 'max:8000'],
        ];
    }
}
