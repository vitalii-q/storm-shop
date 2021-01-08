<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 07.01.2021
 * Time: 20:17
 */

namespace App\Services;


use App\Models\Currency;
use GuzzleHttp\Client;

class CurrencyRates
{
    public static function getRates() {
        $baseCurrency = CurrencyConversion::getBaseCurrency(); // получаем базовую валюту

        $url = config('currency_rates.api_url').'?base='.$baseCurrency->code; // формируем ссылку для получения рейтов относительно базовой валюты

        $client = new Client();

        $response = $client->request('GET', $url); // создаем запрос на Guzzle

        if($response->getStatusCode() !== 200) {
            throw new \Exception('There is problem with currency rate service');
        }

        $rates = json_decode($response->getBody()->getContents(), true)['rates'];

        foreach (Currency::get() as $currency) {
            if($currency->is_main != 1) {
                if(!isset($rates[$currency->code])) {
                    throw new \Exception('There is problem with currency ' . $currency->code);
                } else {
                    $currency->update(['rate' => $rates[$currency->code]]);
                }
            }
        }
    }
}