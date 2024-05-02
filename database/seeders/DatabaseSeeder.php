<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Bandita K',
            'email' => 'beta@memo.com',
            'superadmin' => true,
            'password' => '$2y$12$bCueu1NNhB6S3YkUslUQy.4LUYBxNlieXD696R2dG/XT8LmuO51Y2',
        ]);

        User::factory(10)->create();

        Category::factory(5)->create();

        $books = Book::factory(10)->withImages()->create();

        foreach ($books as $book) {

            // Create array with 1 or 2 unique random numers between 1 and 5
            $keyword_ids = collect([rand(1, 5), rand(1, 5)])->unique()->toArray();

            $book->categories()->attach($keyword_ids);
        }
    }
}
