<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Application::count() == 0) {
            $application = Application::factory(10)->make();

            Application::insert($application->toArray());
        }
    }
}
