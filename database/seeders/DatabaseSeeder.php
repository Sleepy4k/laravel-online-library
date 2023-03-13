<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ApplicationSeeder::class,
            LanguageSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            AuthorSeeder::class,
            BookCategorySeeder::class,
            PublisherSeeder::class,
            BookSeeder::class,
            GradeSeeder::class,
            UserSeeder::class,
            BorrowSeeder::class,
        ]);
    }
}
