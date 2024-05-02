<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        if (auth()->user()->superadmin) {
            $books = Book::with('media')->get();
        } else {
            $books = Book::where('user_id', auth()->user()->id)->get();
        }

        return view('user.books.index', ['books' => $books]);
    }

    public function create()
    {
        return view('user.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:20'],
            'content' => 'required',
        ]);

        $title = $request->title;
        $content = $request->content;

        $book = Book::create([
            'title' => $title,
            'content' => $content,
            'user_id' => auth()->user()->id,
        ]);

        $book->categories()->sync($request->categories);

        session()->flash('success_message', 'Your book was stored successfully');

        return redirect()->route('user.books.show', ['book' => $book->id]);
    }

    public function show(string $id)
    {
        $book = Book::find($id);

        if (!$book->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        return view('user.books.show', ['book' => $book]);
    }

    public function edit(string $id)
    {
        $book = Book::find($id);

        if (!$book->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        return view('user.books.edit', ['book' => $book]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:60'],
            'content' => 'required',
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'photo' => ['nullable', 'file'],
        ]);

        $book = Book::find($id);

        if (!$book->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        $book->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);

        $book->categories()->sync($request->categories);

        if ($request->has('photo')) {
            $book->addMediaFromRequest('photo')->toMediaCollection('photos');
        }

        session()->flash('success_message', 'Your book was updated successfully');

        return redirect()->route('user.books.show', ['book' => $book->id]);
    }

    public function destroy(string $id)
    {
        $book = Book::find($id);

        $book->delete();

        return redirect()->route('books.index');
    }
}
