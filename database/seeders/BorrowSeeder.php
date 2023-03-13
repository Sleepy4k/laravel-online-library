<?php

namespace Database\Seeders;

use App\Models\Borrow;
use Illuminate\Database\Seeder;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Borrow::count() == 0) {
            $borrows = Borrow::factory(25)->make();

            Borrow::insert($borrows->toArray());
        }
    }
}
