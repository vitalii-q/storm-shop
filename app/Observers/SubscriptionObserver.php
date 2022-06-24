<?php

namespace App\Observers;

use App\Models\Subscription;

class SubscriptionObserver
{
    /**
     * Handle the AppModelsSubscription "created" event.
     *
     * @param  \App\Models\Subscription  $appModelsSubscription
     * @return void
     */
    public function created(Subscription $appModelsSubscription)
    {
        // observer - работа с созданной моделью
        $createInfo[] = $appModelsSubscription->isDirty();
        $createInfo[] = $appModelsSubscription->isDirty('user_id');
        $createInfo[] = $appModelsSubscription->getAttribute('email');
        //dd($createInfo);
    }

    /**
     * Handle the AppModelsSubscription "updated" event.
     *
     * @param  \App\Models\Subscription  $appModelsSubscription
     * @return void
     */
    public function updated(Subscription $appModelsSubscription)
    {
        //
    }

    /**
     * Handle the AppModelsSubscription "deleted" event.
     *
     * @param  \App\Models\Subscription  $appModelsSubscription
     * @return void
     */
    public function deleted(Subscription $appModelsSubscription)
    {
        //
    }

    /**
     * Handle the AppModelsSubscription "restored" event.
     *
     * @param  \App\Models\Subscription  $appModelsSubscription
     * @return void
     */
    public function restored(Subscription $appModelsSubscription)
    {
        //
    }

    /**
     * Handle the AppModelsSubscription "force deleted" event.
     *
     * @param  \App\Models\Subscription  $appModelsSubscription
     * @return void
     */
    public function forceDeleted(Subscription $appModelsSubscription)
    {
        //
    }
}
