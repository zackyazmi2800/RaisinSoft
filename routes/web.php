<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\GameController;


Route::get('/', [PostController::class, 'index'])->name('home');


// Menampilkan detail berita berdasarkan ID
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');  // Ganti 'post' dengan 'post.show'
Route::get('/postgame/{id}', [PostController::class, 'postGame'])->name('post.postgame');



Route::get('/post/postgame', function () {
    return view('post/postgame');
})->name('post/postgame');

Route::get('/post/news', function () {
    return view('post/news');
})->name('post/news');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/post', [DashboardPostController::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard.post');
Route::get('/dashboard/user', [DashboardUsersController::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard.user');

Route::middleware(['auth', 'admin'])->group(function () {
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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/dashboard/posts', DashboardPostController::class)
        ->names([
            'index' => 'dashboard.posts',
            'create' => 'dashboard.posts.create',
            'store' => 'dashboard.posts.store',
            'show' => 'dashboard.posts.show',
            'edit' => 'dashboard.posts.edit',
            'update' => 'dashboard.posts.update',
            'destroy' => 'dashboard.posts.destroy',
        ]);
});

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('posts', DashboardPostController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
