<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $books = Book::take(6)->get();

        return view('welcome', ['books' => $books]);
    }
}
