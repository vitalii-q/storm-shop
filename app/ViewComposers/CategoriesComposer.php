<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 05.12.2020
 * Time: 23:08
 */

namespace App\ViewComposers;


use Illuminate\View\View;
use App\Models\Category;

class CategoriesComposer
{
    public function compose(View $view) {
        $categories = Category::get(); // все категории
        $view->with('categoriesHF', $categories); // шарим переменную
    }
}