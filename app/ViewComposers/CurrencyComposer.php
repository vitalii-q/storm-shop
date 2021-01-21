<?php

namespace App\ViewComposers;


use App\Models\Currency;
use Illuminate\View\View;

class CurrencyComposer
{
    public function compose(View $view) {
        $currency = Currency::get(); // получаем все брэнды
        $view->with('currenciesHF', $currency); // шарим
    }
}