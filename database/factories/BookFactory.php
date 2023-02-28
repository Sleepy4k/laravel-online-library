<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'image' => fake()->imageUrl(300, 300, 'books', true, 'Faker', true),
            'year' => fake()->year(),
            'description' => fake()->text(300),
            'author_id' => rand(1, 10),
            'publisher_id' => rand(1, 10),
            'category_id' => rand(1, 10),
        ];
    }
}
