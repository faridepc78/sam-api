<?php

namespace App\Rules;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidationUser implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::query()
            ->findOrFail($value);

        if ($user->roles[0]->name != Role::USER_ROLE) {
            $fail('The responsible_id field is invalid.');
        }
    }
}
