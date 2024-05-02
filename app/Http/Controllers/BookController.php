<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author', 'media')
            ->orderByDesc('created_at')->paginate(4);

        return view('public.books.index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        $related = $this->getRelatedBooks($book);

        return view('public.books.show', ['book' => $book, 'related' => $related]);
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
