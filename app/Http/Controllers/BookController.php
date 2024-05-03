<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author', 'media')
            ->orderByDesc('created_at')->paginate(8);

        return view('public.books.index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        $related = $this->getRelatedBooks($book);

        $reviews = Review::where('book_id', $id)->get();

        return view('public.books.show', ['book' => $book, 'related' => $related, 'reviews' => $reviews]);
    }

    private function getRelatedBooks(Book $book, $numberOfBooks = 6)
    {
        $keywords = $book->categories->pluck('id');

        $related = Book::query()
            ->with('author', 'media', 'categories')
            ->where('id', '!=', $book->id)
            ->whereHas('categories', function ($query) use ($keywords) {
                $query->whereIn('categories.id', $keywords);
            })
            ->limit($numberOfBooks)
            ->orderByDesc('created_at')
            ->get();

        return $related;
    }
}
