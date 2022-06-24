<?php

namespace App\Providers;

use App\Events\EmailSubscription;
use App\Listeners\EmailSubscriptionListener;
use App\Models\Subscription;
use App\Observers\SubscriptionObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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

        EmailSubscription::class => [
            EmailSubscriptionListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Subscription::observe(new SubscriptionObserver());
    }

    /**
     * Автоматическое связывание события с обработчиком
     * необходимо добавление кеша: php artisan event:cache
     *
     * очистить кеш событий: php artisan event:clear
     */
    /*public function shouldDiscoverEvents()
    {
        return true;
    }*/
}
