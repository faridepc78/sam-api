<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::query()->count()) {
            User::query()
                ->create(User::$admin)
                ->assignRole(Role::ADMIN_ROLE);

            $users = User::factory(10)->create();

            foreach ($users as $user) {
                $user->assignRole(Role::USER_ROLE);
            }
        } else {
            $this->command->warn('Users has already been created');
        }
    }
}
