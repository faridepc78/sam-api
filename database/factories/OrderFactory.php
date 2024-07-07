<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Role;
use App\Models\Space;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $checkin = fake()->dateTimeBetween('2024-01-01',
            '2024-01-20');
        $checkout = fake()->dateTimeBetween(
            $checkin->format('Y-m-d H:i:s') . ' +1 day',
            '2024-01-21');

        return [
            'author_id' => User::query()
                ->role(Role::ADMIN_ROLE)
                ->first()->id,
            'guest_id' => User::query()
                ->role(Role::ADMIN_ROLE)
                ->inRandomOrder()
                ->first()->id,
            'space_id' => Space::query()
                ->inRandomOrder()
                ->first()->id,
            'unit' => fake()->numberBetween(1, 10),
            'checkin' => $checkin,
            'checkout' => $checkout,
            'guests' => [
                'adult' => fake()->numberBetween(1, 10),
                'child' => fake()->numberBetween(1, 10),
                'animal' => fake()->numberBetween(1, 10),
                'baby' => fake()->numberBetween(1, 10),
            ],
            'prices' => [
                'site_price' => fake()->numberBetween(100000, 1000000),
                'location_price' => fake()->numberBetween(100000, 1000000),
                'extra_price' => fake()->numberBetween(100000, 1000000),
            ],
            'special_services' => null,
            'type' => fake()->randomElement(Order::types()),
            'description' => fake()->paragraph(),
            'created_at' => fake()->dateTimeBetween('2020-01-01', '2024-12-31'),
            'updated_at' => null,
        ];
    }
}
