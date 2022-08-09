<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/**
 * Routes
 */

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/books/authors/{author_id}', [
        BookController::class, 'showBooksByAuthor'
    ])->name('author-books');

    Route::get('/books/categories/{category_id}', [
        BookController::class, 'showBooksByCategory'
    ])->name('category-books');

    Route::resources([
        'categories' => CategoryController::class,
        'authors' => AuthorController::class,
        'books' => BookController::class,
    ]);

    Route::group(['middleware' => ['can:user-create']], function () {
        Route::resource('users', UserController::class);
    });
});

require __DIR__.'/auth.php';
