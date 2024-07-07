<?php

namespace App\Http\Requests\Api\V1\Auth;

use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'mobile' => ['required', new ValidationMobile()],
            'password' => ['required', 'string', 'max:255'],
        ];
    }
}
