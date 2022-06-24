<?php

namespace App\Providers;

use App\Models\Subscription;
use App\Observers\SubscriptionObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Date;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useCustomStorm(); // используем кастомную пагинацию
        //Paginator::useBootstrap(); // используем bootstrap пагинацию

        Date::setlocale(config('app.locale'));

        Subscription::observe(new SubscriptionObserver()); // вызывает функции observer при работе с моделью (create, update...) | что то вроде магических методов
    }
}
