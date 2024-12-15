<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardUsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/post/postgame', function () {
    return view('post/postgame');
})->name('post/postgame');

Route::get('/post/news', function () {
    return view('post/news');
})->name('post/news');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard/post', [HomeController::class, 'index'])->name('dashboard.post');
    Route::resource('/dashboard/users', DashboardUsersController::class)
        ->names([
            'index' => 'dashboard.users',
            'create' => 'dashboard.users.create',
            'store' => 'dashboard.users.store',
            'show' => 'dashboard.users.show',
            'edit' => 'dashboard.users.edit',
            'update' => 'dashboard.users.update',
            'destroy' => 'dashboard.users.destroy',
        ]);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';