<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homePage'])->name('home');
Route::get('/about', [PageController::class, 'aboutPage'])->name('about');
Route::get('/contacts', [PageController::class, 'contactsPage'])->name('contacts');
Route::get('/posts', [PostController::class, 'index'])->name('posts_front');
Route::get('/posts/show/{post}', [PostController::class, 'show'])->name('post_show_front');
Route::post('/contacts', [MessageController::class, 'store'])->name('store_message');

Route::prefix('/dashboard')->middleware(['auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/feedbacks');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
    Route::resource('/posts', PostController::class);
});

require __DIR__.'/auth.php';



Route::get('/test', function(\App\Http\Services\Pushall $pushall) {
    dd($pushall);
});
