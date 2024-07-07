<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Space;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpaceFactory extends Factory
{
    protected $model = Space::class;

    public function definition(): array
    {
        return [
            'author_id' => User::query()
                ->role(Role::ADMIN_ROLE)
                ->first()->id,
            'name' => fake()->name(),
            'unit' => fake()->numberBetween(1, 10),
            'standard_capacity' => fake()->numberBetween(1, 10),
            'extra_capacity' => fake()->numberBetween(1, 10),
            'prices' => [
                'normal_days' => fake()->numberBetween(100000, 1000000),
                'weekends_days' => fake()->numberBetween(100000, 1000000),
                'peak_days' => fake()->numberBetween(100000, 1000000),
                'eid_days' => fake()->numberBetween(100000, 1000000),
            ],
            'responsible_id' => User::query()
                ->role(Role::USER_ROLE)
                ->inRandomOrder()
                ->first()->id,
            'address' => fake()->address(),
            'description' => fake()->paragraph(),
        ];
    }
}
