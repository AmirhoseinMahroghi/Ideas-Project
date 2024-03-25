<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class LikeIdeaController extends Controller
{
    public function like(Idea $idea)
    {
        $liker = auth()->user();
        $liker->likes()->attach($idea);

        return redirect()->back()->with('success', 'liked idea successflly!');
    }

    public function unlike(Idea $idea)
    {
        $liker = auth()->user();
        $liker->likes()->detach($idea);

        return redirect()->back()->with('success', 'unliked idea successflly!');
    }
}
