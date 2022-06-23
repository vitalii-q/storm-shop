<?php

namespace App\Providers;

use App\Contracts\Video\VideoHosting;
use App\Services\Video\Vimeo;
use App\Services\Video\Youtube;
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
        $serviceVimeo = new Vimeo();

        $this->app->instance(VideoHosting::class, $serviceVimeo);
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
    }
}
