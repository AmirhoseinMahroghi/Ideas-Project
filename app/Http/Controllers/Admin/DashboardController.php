<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalIdeas = Idea::count();
        $totalComments = comment::count();
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalIdeas' => $totalIdeas,
            'totalComments' => $totalComments,
        ]);
    }
}
