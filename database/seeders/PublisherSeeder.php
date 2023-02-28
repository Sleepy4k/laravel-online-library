<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Publisher::count() == 0) {
            $publishers = Publisher::factory(10)->make();

            Publisher::insert($publishers->toArray());
        }
    }
}
