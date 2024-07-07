<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'author_id' => User::query()
                ->role(Role::ADMIN_ROLE)
                ->first()->id,
            'name' => fake()->name(),
            'mobile' => '+989' . fake()->unique()->numerify('#########'),
            'password' => 12345678,
        ];
    }
}
