<?php

namespace App\Services;

use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class CurrencyConversion
{
    public static function convert($price) {
        if(session()->get('currency') != null) { // если сессия валюты установленна
            $selectedCurrency = Currency::where('code', session()->get('currency'))->first();
            if($selectedCurrency->updated_at->startOfDay()->toString() !== Carbon::now()->startOfDay()->toString()){ // обновляем если ставки вчерашние
                CurrencyRates::getRates();
            }

            return round($price * $selectedCurrency->rate, 2);
        } else { // если сессия валюты не установленна
            //$standardCurrency = Currency::where('is_main', 1)->first();
            return $price;
        }
    }

    public static function currencySymbol() {
        if(session()->get('currency') != null) {
            return Currency::where('code', session()->get('currency'))->first()->symbol;
        } else {
            return Cache::remember('standardCurrency', Carbon::now()->addMinutes(60), function () {
                return Currency::where('is_main', 1)->first()->symbol; // стандартная валюта
            });
        }
    }

    public static function getBaseCurrency() {
        return Currency::where('is_main', 1)->first();
    }

    public static function getActiveCurrencyId() {
        if(session()->get('currency') != null) { // если установленна сессия валюты
            return Currency::where('code', session()->get('currency'))->first()->id;
        } else { // если не установленна сессия валюты
            return $standardCurrency = Currency::where('is_main', 1)->first()->id;
        }
    }

    public static function getCurrencyById($price, $id) {
        $currency = Currency::where('id', $id)->first();
        return round($price * $currency->rate, 2);
    }

    public static function getCurrencySymbol($id) {
        return $currency = Currency::where('id', $id)->first()->symbol;
    }
}
