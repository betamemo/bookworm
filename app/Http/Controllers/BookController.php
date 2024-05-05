<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('media')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('public.books.index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        $reviews = Review::where('book_id', $id)->get();

        return view('public.books.show', ['book' => $book, 'reviews' => $reviews]);
    }
}
