<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function create()
    {
        return view('public.search.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:3|max:255',
        ]);

        $search_term = $request->search;

        // Look for keywords with the search term
        $genre = Genre::query()
            ->where('name', 'LIKE', '%' . $search_term . '%')
            ->first();

        $books_from_keyword = $genre?->books;

        // Look for books with the search term
        $books_direct = Book::query()
            ->where('name', 'LIKE', '%' . $search_term . '%')
            ->orWhere('author', 'LIKE', '%' . $search_term . '%')
            ->orWhere('isbn', 'LIKE', '%' . $search_term . '%')
            ->get();

        $books = $books_direct->union($books_from_keyword);

        return view('public.search.results', compact('books', 'search_term'));
    }
}
