<?php

namespace App\Http\Requests\Api\V1\Admin\Order;

use App\Models\Order;
use App\Rules\ValidationUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        return [
            'guest_id' => ['nullable', 'exists:users,id', new ValidationUser()],
            'space_id' => ['nullable', 'exists:spaces,id'],
            'unit' => ['nullable', 'numeric'],
            'checkin' => ['nullable', 'date', 'date_format:Y-m-d'],
            'checkout' => ['nullable', 'date', 'date_format:Y-m-d', 'after:checkin'],

            'guests' => ['nullable', 'array', 'size:1'],
            'guests.*' => ['size:4'],
            'guests.*.adult' => ['required', 'numeric'],
            'guests.*.child' => ['required', 'numeric'],
            'guests.*.animal' => ['required', 'numeric'],
            'guests.*.baby' => ['required', 'numeric'],

            'prices' => ['nullable', 'array', 'size:1'],
            'prices.*' => ['size:3'],
            'prices.*.site_price' => ['nullable', 'numeric'],
            'prices.*.location_price' => ['nullable', 'numeric'],
            'prices.*.extra_price' => ['nullable', 'numeric'],

            'special_services' => ['nullable', 'array'],

            'type' => ['nullable', Rule::in(Order::types())],
            'description' => ['nullable', 'string', 'max:5000'],
        ];
    }
}
