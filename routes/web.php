<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/**
 *
 */

/* Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('categories', CategoryController::class); */

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['can:books-access']], function () {
    Route::resource('books', BookController::class);
});

Route::group(['middleware' => ['can:author-access']], function () {
    Route::resource('authors', AuthorController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
