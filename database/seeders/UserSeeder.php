<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            User::factory(25)->create()->each(function ($user) {
                $role = fake()->randomElement(['admin', 'user']);
                $user->assignRole($role);
            });
        }
    }
}
