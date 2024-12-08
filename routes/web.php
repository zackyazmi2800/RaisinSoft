<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard/post', function () {
    return view('post');
})->middleware(['auth', 'verified'])->name('dashboard.post');


Route::get('/dashboard/user', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('dashboard.user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('admin/users', [HomeController::class, 'index'])->name('admin.users');
Route::get('admin/users', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('admin/post', [HomeController::class, 'index'])->middleware(['auth', 'admin']);