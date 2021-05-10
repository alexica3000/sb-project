<?php

namespace App\Providers;

use App\Events\PostCreatedEvent;
use App\Events\PostDeletedEvent;
use App\Events\PostUpdatedEvent;
use App\Listeners\PostDeletedListener;
use App\Listeners\PostUpdatedListener;
use App\Listeners\PostCreatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostCreatedEvent::class => [
            PostCreatedListener::class,
        ],
        PostUpdatedEvent::class => [
            PostUpdatedListener::class,
        ],
        PostDeletedEvent::class => [
            PostDeletedListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
