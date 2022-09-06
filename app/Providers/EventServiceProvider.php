<?php

namespace App\Providers;

use App\Events\PostReadedEvent;
use App\Events\SaveAuthorOnCreatedPostEvent;
use App\Events\UserCreatedEvent;
use App\Events\UserDeletedEvent;
use App\Events\UserUpdatedEvent;
use App\Listeners\PostReadedListener;
use App\Listeners\SaveAuthorOnCreatedPostListener;
use App\Listeners\UserCreatedListener;
use App\Listeners\UserDeletedListener;
use App\Listeners\UserUpdatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostReadedEvent::class => [
            PostReadedListener::class,
        ],
        SaveAuthorOnCreatedPostEvent::class => [
            SaveAuthorOnCreatedPostListener::class,
        ],
        UserCreatedEvent::class =>[
            UserCreatedListener::class
        ],
        UserUpdatedEvent::class =>[
            UserUpdatedListener::class
        ],
        UserDeletedEvent::class =>[
            UserDeletedListener::class
        ],
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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
