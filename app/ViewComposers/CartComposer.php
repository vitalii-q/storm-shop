<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 05.12.2020
 * Time: 22:37
 */

namespace App\ViewComposers;


use Illuminate\View\View;

class CartComposer
{
    public function compose(View $view) {
        $cart = $products = session('cart.products');
        $view->with('cartHF', $cart); // шарим переменную cartHT как cartHF
    }
}