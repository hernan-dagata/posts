<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/categories', [CategoryController::class, 'indexView'])->name('categories.indexView');
Route::post('/categories', [CategoryController::class, 'storeView']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroyView']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);

Route::get('/posts', [PostController::class, 'indexView'])->name('posts.indexView');
Route::post('/posts', [PostController::class, 'storeView']);
Route::delete('/posts/{post}', [PostController::class, 'destroyView']);
Route::put('/posts/{post}', [PostController::class, 'update']);