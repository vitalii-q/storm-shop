<?php

namespace App\Foundation;

use App\Contracts\CatalogProductsInterface;
use App\Contracts\CatalogDesiresInterface;
use App\Http\Controllers\FilterController;
use App\Models\Product;
use App\Models\Sku;

class CatalogProducts implements CatalogProductsInterface
{
    public function get($selected_category = null, $selected_brand = null)
    {
        if (!empty(session()->get('catalog.filter'))) { // если установлен фильтр, прогружает отфильтрованные продукты
            $skus = Sku::get();
            $productsIdsWithDubls = [];
            foreach ($skus as $sku) {array_push($productsIdsWithDubls, $sku->product->id);}
            $productsIdsWithDubls = array_flip(array_flip($productsIdsWithDubls));

            if($selected_category == null and $selected_brand == null) { // catalog
                $productsBeforeFiltering = Product::whereIn('id', $productsIdsWithDubls)->get(); // выводим продукты у которых есть торговые предложения
            } elseif ($selected_category !== null and $selected_brand == null) { // category
                $productsBeforeFiltering = Product::whereIn('id', $productsIdsWithDubls)->where('category_id', $selected_category->id)->get();
            } elseif ($selected_category == null and $selected_brand !== null) { // brand
                $productsBeforeFiltering = Product::whereIn('id', $productsIdsWithDubls)->where('brand_id', $selected_brand->id)->paginate(9);
            } elseif ($selected_category !== null and $selected_brand !== null) { // brandCategory
                $productsBeforeFiltering = Product::whereIn('id', $productsIdsWithDubls)
                    ->where('brand_id', $selected_brand->id)->where('category_id', $selected_category->id)->paginate(9);
            }

            $products = FilterController::filterSession($productsBeforeFiltering);
        } else { // получаем продукты категори | бренда
            $skus = Sku::get();
            $productsIdsWithDubls = [];
            foreach($skus as $sku) {array_push($productsIdsWithDubls, $sku->product->id);}
            $productsIdsWithDubls = array_flip(array_flip($productsIdsWithDubls));

            if($selected_category == null and $selected_brand == null) { // catalog
                $products = Product::whereIn('id', $productsIdsWithDubls)->paginate(9);
            } elseif ($selected_category !== null and $selected_brand == null) { // category
                $products = Product::whereIn('id', $productsIdsWithDubls)->where('category_id', $selected_category->id)->paginate(9);
            } elseif ($selected_category == null and $selected_brand !== null) { // brand
                $products = Product::whereIn('id', $productsIdsWithDubls)->where('brand_id', $selected_brand->id)->paginate(9);
            } elseif ($selected_category !== null and $selected_brand !== null) { // brandCategory
                $products = Product::whereIn('id', $productsIdsWithDubls)
                    ->where('brand_id', $selected_brand->id)->where('category_id', $selected_category->id)->paginate(9);
            }
        }

        return $products;
    }
}
