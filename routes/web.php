<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;


// Authentication
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
Route::get('logout', [LogoutController::class, 'index']);
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Route::view('/', 'home');
Route::view('/dashboard', 'dashboard')->middleware('auth')->name('dashboard');
