<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genders = config()->get('gender.list');

        return [
            'name' => fake()->name(),
            'age' => fake()->numberBetween(18, 60),
            'email' => fake()->unique()->safeEmail(),
            'phone' => '08' . fake()->numberBetween(100000000, 999999999),
            'address' => fake()->address(),
            'gender' => fake()->randomElement($genders),
            'grade_id' => fake()->numberBetween(1, 5),
            'password' => 'password', // password
        ];
    }
}
