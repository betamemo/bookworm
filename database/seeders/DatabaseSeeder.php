<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Collection;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Beta',
            'email' => 'beta@memo.com',
            'superadmin' => true,
            'password' => '$2y$12$bCueu1NNhB6S3YkUslUQy.4LUYBxNlieXD696R2dG/XT8LmuO51Y2', // 12345678
        ]);

        User::create([
            'name' => 'Jeno',
            'email' => 'jeno@dream.nct',
            'superadmin' => false,
            'password' => '$2y$12$bCueu1NNhB6S3YkUslUQy.4LUYBxNlieXD696R2dG/XT8LmuO51Y2', // 12345678
        ]);

        User::factory(5)->create();

        Status::create(['name' => 'Want to read']);
        Status::create(['name' => 'Reading']);
        Status::create(['name' => 'Finished']);

        Genre::factory(20)->create();
        
        Author::factory(20)->create();

        $books = Book::factory(60)->withImages()->create();

        Review::factory(60)->create();

        Collection::factory(60)->create();
    }
}
