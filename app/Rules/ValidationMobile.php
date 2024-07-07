<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidationMobile implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = '/^((\+98)9\d{9})$/m';

        if (!preg_match($pattern, $value)) {
            $fail('The mobile field is invalid.');
        }
    }
}
