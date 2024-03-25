<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = auth()->user();
        $follower->followings()->attach($user);

        return redirect()->back()->with('success', 'followed successflly!');
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        $follower->followings()->detach($user);

        return redirect()->back()->with('success', 'unfollowed successflly!');
    }

    public function followings()
    {
        $followings = auth()->user()->followings;
        return view('users.followings', ['followings' => $followings]);
    }

    public function followers()
    {
        $followers = auth()->user()->followers;
        return view('users.followers', ['followers' => $followers]);
    }
}
