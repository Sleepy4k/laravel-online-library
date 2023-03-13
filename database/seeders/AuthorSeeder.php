<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Author::count() == 0) {
            $authors = Author::factory(25)->make();

            Author::insert($authors->toArray());
        }
    }
}
