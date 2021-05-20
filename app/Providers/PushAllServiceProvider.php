<?php

namespace App\Providers;

use App\Http\Services\Pushall;
use Illuminate\Support\ServiceProvider;

class PushAllServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Pushall::class, function() {
            return new Pushall(config('services.pushall.key'), config('services.pushall.id'));
        });
    }
}
