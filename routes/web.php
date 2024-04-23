<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'welcome']);

Route::get('books', function () {
    return view('books');
});
