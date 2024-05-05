<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Genre;
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
            'name' => fake()->sentence,
            'author' => fake()->name,
            'publisher' => fake()->word,
            'isbn' => fake()->unique()->isbn13(),
            'content' => $this->generateTextInParagraphs(random_int(1, 5)),
            'genre_id' => Genre::all()->random()->id,

            'created_at' => fake()->dateTimeThisYear,
        ];
    }

    private function generateTextInParagraphs(int $numberOfParagrpahs): string
    {
        $text = '';

        for ($i = 0; $i < $numberOfParagrpahs; $i++) {
            $text .= fake()->realText(random_int(200, 800)) . "\n\n";
        }

        return $text;
    }

    public function configure()
    {
        return $this->afterCreating(function (Book $book) {
            return $book;
        });
    }

    // Solution from https://laracasts.com/discuss/channels/testing/how-to-disable-factory-callbacks
    public function withImages(): self
    {
        //Alternative source: https://loremflickr.com/640/480';
        return $this->afterCreating(function (Book $book) {
            $url = 'https://source.unsplash.com/random/800x600/?book';
            $book
                ->addMediaFromUrl($url)
                ->toMediaCollection();
        });
    }
}
