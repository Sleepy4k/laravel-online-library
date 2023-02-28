<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Grade::count() == 0) {
            $grades = Grade::factory(10)->make();

            Grade::insert($grades->toArray());
        }
    }
}
