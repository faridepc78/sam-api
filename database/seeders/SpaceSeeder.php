<?php

namespace Database\Seeders;

use App\Models\Space;
use Illuminate\Database\Seeder;

class SpaceSeeder extends Seeder
{
    public function run(): void
    {
        if (!Space::query()->count()) {
            Space::factory(20)->create();
        } else {
            $this->command->warn('Spaces has already been created');
        }
    }
}
