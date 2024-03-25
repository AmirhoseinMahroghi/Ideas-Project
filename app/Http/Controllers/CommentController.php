<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea, Request $request)
    {
        $request->validate([
            'bodyComment' => 'required|min:5|max:255'
        ]);

        comment::create([
            'body' => $request->bodyComment,
            'idea_id' => $idea->id,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('dashboard')->with('success', 'created comment successflly!');
    }
}
