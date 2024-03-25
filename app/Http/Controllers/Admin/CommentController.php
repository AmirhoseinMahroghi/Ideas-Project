<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = comment::latest()->paginate(5);
        return view('admin.comments.comments', ['comments' => $comments]);
    }

    public function destroy(comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments')->with('success', 'deleted comment successflly!');
    }
}

