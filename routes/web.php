<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', \App\Http\Controllers\WelcomeController::class);

Route::resource('genres', \App\Http\Controllers\GenreController::class)->only('index', 'show');

Route::get('/books', [\App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [\App\Http\Controllers\BookController::class, 'show'])->name('books.show');

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'create'])->name('search.create');
Route::post('/search', [\App\Http\Controllers\SearchController::class, 'store'])->name('search.store');


// User routes
require __DIR__ . '/auth.php';

Route::redirect('/dashboard', 'user/collection')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::resource('collection', \App\Http\Controllers\User\CollectionController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
