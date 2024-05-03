<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        if (auth()->user()->superadmin) {
            $reviews = Review::with('media')->get();
        } else {
            $reviews = Review::where('user_id', auth()->user()->id)->get();
        }

        return view('user.reviews.index', ['reviews' => $reviews]);
    }

    public function create()
    {
        return view('user.reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:20'],
            'content' => 'required',
        ]);

        $title = $request->title;
        $content = $request->content;

        $review = Review::create([
            'title' => $title,
            'content' => $content,
            'user_id' => auth()->user()->id,
        ]);

        $review->categories()->sync($request->categories);

        session()->flash('success_message', 'Your review was stored successfully');

        return redirect()->route('user.reviews.show', ['review' => $review->id]);
    }

    public function show(string $id)
    {
        $review = Review::find($id);

        if (!$review->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        return view('user.reviews.show', ['review' => $review]);
    }

    public function edit(string $id)
    {
        $review = Review::find($id);

        if (!$review->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        return view('user.reviews.edit', ['review' => $review]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:60'],
            'content' => 'required',
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'photo' => ['nullable', 'file'],
        ]);

        $review = Review::find($id);

        if (!$review->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        $review->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);

        $review->categories()->sync($request->categories);

        if ($request->has('photo')) {
            $review->addMediaFromRequest('photo')->toMediaCollection('photos');
        }

        session()->flash('success_message', 'Your review was updated successfully');

        return redirect()->route('user.reviews.show', ['review' => $review->id]);
    }

    public function destroy(string $id)
    {
        $review = Review::find($id);

        $review->delete();

        return redirect()->route('reviews.index');
    }
}
