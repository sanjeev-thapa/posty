<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


// Authentication
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::view('/', 'home');
Route::view('/dashboard', 'dashboard')->middleware('auth')->name('dashboard');
