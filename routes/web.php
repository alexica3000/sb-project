<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('/dashboard')->middleware(['auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/feedbacks');
});

require __DIR__.'/auth.php';

Route::get('/about', [PageController::class, 'aboutPage'])->name('about');
Route::get('/contacts', [PageController::class, 'contactsPage'])->name('contacts');
Route::resource('/posts', PostController::class);
