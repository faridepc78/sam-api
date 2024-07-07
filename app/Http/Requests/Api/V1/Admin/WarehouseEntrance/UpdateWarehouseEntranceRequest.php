<?php

namespace App\Http\Requests\Api\V1\Admin\WarehouseEntrance;

use App\Models\WarehouseEntrance;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWarehouseEntranceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {

        return [
            'category_id' => ['nullable'],
            'clerk_id' => ['nullable'],
            'space_id' => ['nullable'],
            'title' => ['nullable', 'string', 'max:255'],
            'code' => ['nullable', 'string', 'max:255'],
            'counter' => ['nullable', 'string'],
            'price' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'expiration_date' => ['nullable', 'string'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:2048'],
        ];
    }
}
