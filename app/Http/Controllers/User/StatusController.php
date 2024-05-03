<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $status = Status::all();

        return view('user.status.index', compact('status'));
    }

    public function create()
    {
        return view('user.status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
        ]);

        Status::create([
            'name' => $request->name,
        ]);

        session()->flash('success_message', 'Your Status was created successfully');

        return redirect()->route('user.status.index');
    }

    public function show(string $id)
    {
        $Status = Status::findOrFail($id);

        return view('user.status.show', compact('Status'));
    }

    public function edit(string $id)
    {
        $Status = Status::findOrFail($id);

        return view('user.status.edit', compact('Status'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
        ]);

        $Status = Status::findOrFail($id);

        $Status->update([
            'name' => $request->name,
        ]);

        session()->flash('success_message', 'Your Status was updated successfully');

        return redirect()->route('user.status.index');
    }

    public function destroy(string $id)
    {
        $Status = Status::findOrFail($id);

        if ($Status->articles->count() > 0) {
            abort(403, 'This Status has articles and cannot be deleted');
        }

        // Checking if a Status can be deleted

        $Status->delete();

        return redirect()->back();
    }
}
