<?php

namespace App\Http\Requests\Api\V1\Admin\Repair;

use App\Models\Repair;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRepairRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {

        return [
            'clerk_id' => ['nullable'],
            'space_id' => ['nullable'],
            'title' => ['nullable', 'string', 'max:255'],
            'code' => ['nullable', 'string'],
            'price' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'expiration_date' => ['nullable', 'string'],
            'status' => ['required', Rule::in(Repair::$statuses)]
        ];
    }
}
