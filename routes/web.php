<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/posts/show/{post}', [PageController::class, 'showPost'])->name('post_show_front');
Route::get('/posts/tags/{tag}', [PageController::class, 'tag'])->name('posts.tag');
Route::post('/contacts', [PageController::class, 'storeMessage'])->name('store_message');

Route::prefix('/dashboard')->middleware(['auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/posts', PostController::class);

    Route::middleware('isAdmin')->group(function() {
        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
        Route::get('/all-posts', [PostController::class, 'allPosts'])->name('posts.all');
    });
});

require __DIR__.'/auth.php';

Route::get('/test', function(\App\Http\Services\Pushall $pushall) {
    dd($pushall);
});
