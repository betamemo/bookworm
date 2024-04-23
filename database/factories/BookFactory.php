<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'author' => fake()->name(),
            'language' => fake()->numberBetween(1, 10),
            'publisher' => fake()->numberBetween(1, 10),
            'publication_date' => fake()->date(),
        ];
    }
}