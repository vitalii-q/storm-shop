<?php

namespace App\Listeners;

use App\Events\EmailSubscription;
use App\Models\AdminNotifications;
use App\Models\Subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class EmailSubscriptionListener // implements ShouldQueue для работы через очередь
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EmailSubscription $event)
    {
        $subscription = Subscription::create([ // создает новую запись в таблице Message
            'user_id' => Auth::check() ? Auth::user()->id : null,
            'email' => $event->email,
            'status' => 1,
        ]);

        AdminNotifications::create([
            'notification_id' => $subscription->id,
            'type' => 'Подписка',
            'view' => 0,
        ]);
    }
}
