<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::with('users', 'books', 'statuses')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('user.collections.index', ['collections' => $collections]);
    }

    public function create()
    {
        return view('user.collections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:20'],
            'content' => 'required',
        ]);

        $title = $request->title;
        $content = $request->content;

        $collection = Collection::create([
            'title' => $title,
            'content' => $content,
            'user_id' => auth()->user()->id,
        ]);

        $collection->categories()->sync($request->categories);

        session()->flash('success_message', 'Your collection was stored successfully');

        return redirect()->route('user.collections.show', ['collection' => $collection->id]);
    }

    public function show(string $id)
    {
        $collection = Collection::find($id);

        if (!$collection->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        return view('user.collections.show', ['collection' => $collection]);
    }

    public function edit(string $id)
    {
        $collection = Collection::find($id);

        if (!$collection->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        return view('user.collections.edit', ['collection' => $collection]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:60'],
            'content' => 'required',
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'photo' => ['nullable', 'file'],
        ]);

        $collection = Collection::find($id);

        if (!$collection->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        $collection->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);

        $collection->categories()->sync($request->categories);

        if ($request->has('photo')) {
            $collection->addMediaFromRequest('photo')->toMediaCollection('photos');
        }

        session()->flash('success_message', 'Your collection was updated successfully');

        return redirect()->route('user.collections.show', ['collection' => $collection->id]);
    }

    public function destroy(string $id)
    {
        $collection = Collection::find($id);

        $collection->delete();

        return redirect()->route('collections.index');
    }
}
