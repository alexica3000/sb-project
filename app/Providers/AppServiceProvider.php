<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('layouts.sidebar', function(View $view) {
            $tags = Cache::tags(['tags'])->remember('cloud', 3600, function() {
                return Tag::tagsCloud();
            });
            $view->with('tagsCloud', $tags);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::if('admin', function() {
            return auth()->check() && auth()->user()->isAdmin();
        });
    }
}
