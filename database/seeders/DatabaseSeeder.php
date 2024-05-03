<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Category;
use App\Models\Review;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Bandita',
            'email' => 'beta@memo.com',
            'superadmin' => true,
            'password' => '$2y$12$bCueu1NNhB6S3YkUslUQy.4LUYBxNlieXD696R2dG/XT8LmuO51Y2', // 12345678
        ]);

        User::factory(10)->create();

        Category::factory(10)->create();

        Status::create(['name' => 'Want to read']);
        Status::create(['name' => 'Reading']);
        Status::create(['name' => 'Finished']);

        $books = Book::factory(20)->withImages()->create();

        foreach ($books as $book) {

            // Create array with 1 or 2 unique random numers between 1 and 5
            $keyword_ids = collect([rand(1, 5), rand(1, 5)])->unique()->toArray();

            $book->categories()->attach($keyword_ids);
        }

        Review::factory(20)->create();

        BookStatus::factory(20)->create();
    }
}
