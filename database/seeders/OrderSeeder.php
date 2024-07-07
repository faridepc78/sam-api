<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        if (!Order::query()->count()) {
            Order::factory(100)->create();
        } else {
            $this->command->warn('Orders has already been created');
        }
    }
}
