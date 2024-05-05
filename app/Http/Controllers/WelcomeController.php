<?php

namespace App\Http\Controllers;

use App\Models\Book;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        // $books = Book::with('media')->latest('created_at')->take(5)->get();
        
        $books = Book::get();

        return view('public.welcome', ['books' => $books]);
    }
}
