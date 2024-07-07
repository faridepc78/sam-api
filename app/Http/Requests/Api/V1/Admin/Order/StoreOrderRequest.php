<?php

namespace App\Http\Requests\Api\V1\Admin\Order;

use App\Models\Order;
use App\Rules\ValidationUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
            'guest_id' => ['required', 'exists:users,id', new ValidationUser()],
            'space_id' => ['required', 'exists:spaces,id'],
            'unit' => ['required', 'numeric'],
            'checkin' => ['required', 'date', 'date_format:Y-m-d'],
            'checkout' => ['required', 'date', 'date_format:Y-m-d', 'after:checkin'],

            'guests' => ['required', 'array', 'size:1'],
            'guests.*' => ['size:4'],
            'guests.*.adult' => ['required', 'numeric'],
            'guests.*.child' => ['required', 'numeric'],
            'guests.*.animal' => ['required', 'numeric'],
            'guests.*.baby' => ['required', 'numeric'],

            'prices' => ['required', 'array', 'size:1'],
            'prices.*' => ['size:3'],
            'prices.*.site_price' => ['required', 'numeric'],
            'prices.*.location_price' => ['required', 'numeric'],
            'prices.*.extra_price' => ['required', 'numeric'],

            'special_services' => ['nullable', 'array'],

            'type' => ['required', Rule::in(Order::types())],
            'description' => ['nullable', 'string', 'max:5000'],
        ];
    }
}
