<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;


// Authentication
require_once __DIR__ . '/auth.php';

Route::view('/', 'home');
Route::view('dashboard', 'dashboard')->middleware('auth')->name('dashboard');

// Post
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Like
Route::post('likes/{post}', [LikeController::class, 'store'])->name('likes.store');
Route::delete('likes/{post}', [LikeController::class, 'destroy'])->name('likes.destroy');
