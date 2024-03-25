<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\LikeIdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IdeaController::class, 'index'])->name('dashboard');
Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::get('/followings', [FollowerController::class, 'followings'])->middleware('auth')->name('users.followings');
Route::get('/followers', [FollowerController::class, 'followers'])->middleware('auth')->name('users.followers');

Route::prefix('users')->as('users.')->group(function () {
    Route::get('/{user:slug}', [UserController::class, 'show'])->name('show');
    Route::get('/{user:slug}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user:slug}', [UserController::class, 'update'])->name('update');
});

Route::prefix('ideas')->as('ideas.')->middleware('auth')->group(function () {

    Route::post('/idea', [IdeaController::class, 'store'])->name('create')->withoutMiddleware('auth');
    Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
    Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('show');
    Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
    Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('update');
    Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.create');

    // Like and Unlike
    Route::post('{idea}/like', [LikeIdeaController::class, 'like'])->name('like');
    Route::post('{idea}/unlike', [LikeIdeaController::class, 'unlike'])->name('unlike');
});


// Admin Panel
Route::prefix('/admin')->as('admin.')->middleware(['auth', 'can:admin'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/ideas', [AdminIdeaController::class, 'index'])->name('ideas');

    Route::get('/comments', [AdminCommentController::class, 'index'])->name('comments');
    Route::delete('/comments/{comment}', [AdminCommentController::class, 'destroy'])->name('comments.destroy');
});


