<?php

namespace App\Http\Controllers;

use App\Models\Book;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $books = Book::with('author', 'categories', 'media')->latest('created_at')->take(8)->get();

        return view('public.welcome', ['books' => $books]);
    }
}
