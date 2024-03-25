<?php

use App\Http\Controllers\authcontroller;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::any('/register', [authcontroller::class, 'register'])->name('register');
    Route::any('/login', [authcontroller::class, 'login'])->name('login');
});

Route::post('/logout', [authcontroller::class, 'logout'])->middleware('auth')->name('logout');


