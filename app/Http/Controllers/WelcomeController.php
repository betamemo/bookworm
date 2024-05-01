<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $books = Book::take(6)->get();

        return view('welcome', ['books' => $books]);
    }
}
