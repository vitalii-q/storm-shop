<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 08.12.2020
 * Time: 17:09
 */

namespace App\ViewComposers;


use App\Models\Brand;
use Illuminate\View\View;

class BrandsComposer
{
    public function compose(View $view) {
        $brands = Brand::get(); // получаем все брэнды
        $view->with('brandsHF', $brands); // шарим
    }
}