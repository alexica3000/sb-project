<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PushServiceController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/posts/show/{post}', [PageController::class, 'showPost'])->name('post_show_front');
Route::get('/posts/tags/{tag}', [PageController::class, 'tag'])->name('posts.tag');
Route::post('/contacts', [PageController::class, 'storeMessage'])->name('store_message');
Route::get('news', [PageController::class, 'news'])->name('news');
Route::get('news/show/{news}', [PageController::class, 'showNews'])->name('news_show_front');
Route::get('statistics', [PageController::class, 'statistics'])->name('statistics');

Route::prefix('/dashboard')->middleware(['auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/comments-post/{post}', [CommentController::class, 'storeForPost'])->name('comments.store.post');
    Route::post('/comments-news/{news}', [CommentController::class, 'storeForNews'])->name('comments.store.news');
    Route::resource('/posts', PostController::class);

    Route::middleware('isAdmin')->group(function() {
        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
        Route::get('/all-posts', [PostController::class, 'allPosts'])->name('posts.all');

        Route::get('/pushall-form', [PushServiceController::class, 'form'])->name('pushall.form');
        Route::post('/pushall-send', [PushServiceController::class, 'send'])->name('pushall.send');
        Route::resource('news', NewsController::class);

        Route::prefix('reports')->group(function() {
            Route::get('/', [ReportController::class, 'index'])->name('reports.create');
            Route::post('/generate', [ReportController::class, 'generate'])->name('reports.generate');
        });
    });
});

require __DIR__.'/auth.php';
