<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Book::count() == 0) {
            $books = Book::factory(10)->make();

            Book::insert($books->toArray());
        }
    }
}
