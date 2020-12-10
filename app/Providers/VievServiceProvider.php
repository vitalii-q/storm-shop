<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class VievServiceProvider extends ServiceProvider
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
        View::composer('layouts.hf', 'App\ViewComposers\CartComposer'); // указываем какой компосер и куда шарим // можно шарить во мнного шаблонов через массив
        View::composer('layouts.hf', 'App\ViewComposers\CategoriesComposer');
        View::composer('layouts.hf', 'App\ViewComposers\BrandsComposer');
    }
}
