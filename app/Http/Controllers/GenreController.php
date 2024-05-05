<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Book;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::with('books')->get();

        return view('public.genres.index', ['genres' => $genres]);
    }

    public function show(Genre $genre)
    {
        return 'show';
    }
}
