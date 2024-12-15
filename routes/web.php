<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/post/postgame', function () {
    return view('post/postgame');
})->name('post/postgame');

Route::get('/post/news', function () {
    return view('post/news');
})->name('post/news');


Route::get('/admin/users', function () {
    return view('admin.users');
})->middleware(['auth', 'verified'])->name('admin.users');

Route::get('/admin/post', function () {
    return view('admin.post');
})->middleware(['auth', 'verified'])->name('admin.post');

Route::resource('admin/post', DashboardPostController::class)->middleware(['auth', 'admin']);
Route::resource('admin/users', DashboardUserController::class)->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
