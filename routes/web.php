<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;


// Authentication
require_once __DIR__ . '/auth.php';

Route::view('/', 'home');
Route::view('dashboard', 'dashboard')->middleware('auth')->name('dashboard');

// Post
Route::resource('posts', PostController::class)->only(['index', 'store', 'show', 'destroy']);

// Like
Route::post('likes/{post}', [LikeController::class, 'store'])->name('likes.store');
Route::delete('likes/{post}', [LikeController::class, 'destroy'])->name('likes.destroy');

// Profile
Route::get('profiles/{user}', [ProfileController::class, 'show'])->name('profiles.show');
