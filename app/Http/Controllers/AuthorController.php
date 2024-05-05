<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('books')
        ->orderBy('name')
        ->paginate(5);

        return view('public.authors.index', ['authors' => $authors]);
    }

    public function show(Author $author)
    {
        return 'author show';
    }
}
