<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Seeder;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (BookCategory::count() == 0) {
            $categories = BookCategory::factory(10)->make();

            BookCategory::insert($categories->toArray());
        }
    }
}
