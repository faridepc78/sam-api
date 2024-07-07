<?php

namespace App\Http\Requests\Api\V1\Admin\WarehouseExit;

use App\Models\WarehouseExit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWarehouseExitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {

        return [
            //'category_id' => ['nullable'],
            'clerk_id' => ['nullable'],
            'space_id' => ['nullable'],
            'warehouse_entrance_id' => ['nullable'],
            'title' => ['nullable', 'string', 'max:255'],
            'counter' => ['nullable', 'string'],
            'price' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'expiration_date' => ['nullable', 'string'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:2048'],
        ];
    }
}
