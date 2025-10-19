<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

// with {post} we bind a model to the route
// Route::middleware('auth')->group(function() {
//     Route::post('/posts', [PostController::class, 'store']);
//     Route::get('/posts/{post}/edit', action: [PostController::class, 'edit']);
//     Route::put('/posts/{post}', action: [PostController::class, 'update']);
//     Route::delete('/posts/{post}', action: [PostController::class, 'destroy']);
// });

// the shorthand way to defining the routes with resources
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)
        ->only(['store', 'edit', 'update', 'destroy']);
});

Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register', Register::class)
    ->middleware('guest');

Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');

Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', Login::class)
    ->middleware('guest');
