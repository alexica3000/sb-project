<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/about', [PageController::class, 'aboutPage'])->name('about');
Route::get('/contacts', [PageController::class, 'contactsPage'])->name('contacts');
Route::resource('/posts', PostController::class);
