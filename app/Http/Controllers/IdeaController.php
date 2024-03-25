<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })->orderBy('created_at', 'DESC')->paginate(5);

        return view('dashboard', ['ideas' => $ideas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:5|max:255'
        ]);

        Idea::create([
            'body' => $request->body,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('dashboard')->with('success', 'created idea successflly!');
    }
    public function show(Idea $idea)
    {
        return view('ideas.show', ['idea' => $idea]);
    }

    public function edit(Idea $idea)
    {
        $this->authorize('idea.edit', $idea);

        return view('ideas.edit', ['idea' => $idea]);
    }

    public function update(Idea $idea, Request $request)
    {
        $this->authorize('idea.edit', $idea);

        $request->validate([
            'body' => 'required|min:5|max:255'
        ]);

        $idea->update([
            'body' => $request->body
        ]);
        return redirect()->route('dashboard')->with('success', 'updated idea successflly!');
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('idea.delete', $idea);

        $idea->delete();
        return redirect()->route('dashboard')->with('danger', 'deleted idea successflly!');
    }
}
