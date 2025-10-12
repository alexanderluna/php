<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

// with {post} we bind a model to the route
// Route::post('/posts', [PostController::class, 'store']);
// Route::get('/posts/{post}/edit', action: [PostController::class, 'edit']);
// Route::put('/posts/{post}', action: [PostController::class, 'update']);
// Route::delete('/posts/{post}', action: [PostController::class, 'destroy']);

// the shorthand way to defining the routes with resources
Route::resource('posts', PostController::class)->only(['store', 'edit', 'update', 'destroy']);