<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Sku;
use App\Models\SkuValue;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request) {
        session()->put('catalog.filter', $request['valueIds']);

        $valueIdsString = $request['valueIds'];
        $valueIdsArray = explode(',', $valueIdsString);
        $values = []; // значения атрибутов
        foreach ($valueIdsArray as $valueId) {
            array_push($values, AttributeValue::where('id', $valueId)->first());
        }

        $skuArrays = []; // массивы с sku ids у которых минимум один выбранный атрибут
        foreach ($values as $value) {
            array_push($skuArrays, SkuValue::where('attribute_value_id', $value->id)->get());
        }

        $possibleSkuIds = []; // делаем плоский массив возможных sku
        foreach ($skuArrays as $skuArray) {
            foreach ($skuArray as $sku) {
                array_push($possibleSkuIds, $sku->sku_id);
            }
        }

        if(count($skuArrays) > 1) { // если выбранно больше двух атрибутов, оставляем только совпавшие с значениями атрибутов skus
            $skuIds = []; // sku ids
            foreach( array_count_values($possibleSkuIds) as $key => $val ) {
                if ( $val > 1 ) { array_push($skuIds, $key);}
            }
        } else {$skuIds = $possibleSkuIds;}
        $skus = Sku::whereIn('id', $skuIds)->get(); // отфильтрованые skus

        $productIds = []; // id продуктов
        foreach ($skus as $sku) {
            array_push($productIds, $sku->product_id);
        }

        // получаение продуктов для фильтрации в зависимости от категории и бренда
        $position = $request['position'];
        $categoryId = $request['categoryId'];
        $brandId = $request['brandId'];

        if($position == 'catalog') :
            $products = Product::whereIn('id', $productIds)->paginate(9); // получаем продукты отфильтрованных skus
        elseif($position == 'category'):
            $products = Product::where('category_id', $categoryId)->whereIn('id', $productIds)->paginate(9); // получаем отфильтрованные продукты из категори
        elseif($position == 'brand'):
            $products = Product::where('category_id', $brandId)->whereIn('id', $productIds)->paginate(9); // получаем отфильтрованые продукты бренда
        elseif($position == 'brand-category'):
            $products = Product::where('brand_id', $brandId)->where('category_id', $categoryId)->whereIn('id', $productIds)->paginate(9); // получаем продукты отфильтрованных skus категории бренда
        endif;

        // остальные данные для передачи в blade
        $cartProducts = session('cart.products'); // продукты в корзине
        $catalogView = session('view.catalog'); // сессия вида каталога

        //return response([$position, $categoryId, $brandId]);
        return response(view('ajax.catalog_filtered', compact('cartProducts', 'catalogView', 'products')));
    }

    public function filterReset(Request $request) {
        $request->session()->forget('catalog.filter');

        // получаем все продукты с торговыми предложениями
        $skus = Sku::get();
        $productsIdsWithDubls = [];
        foreach($skus as $sku) {array_push($productsIdsWithDubls, $sku->product->id);}
        $productsIds = array_flip(array_flip($productsIdsWithDubls));

        // получаение продуктов для фильтрации в зависимости от категории и бренда
        $position = $request['position'];
        $categoryId = $request['categoryId'];
        $brandId = $request['brandId'];

        if($position == 'catalog') :
            $products = Product::whereIn('id', $productsIds)->paginate(9); // получаем продукты с skus
        elseif($position == 'category'):
            $products = Product::where('category_id', $categoryId)->whereIn('id', $productsIds)->paginate(9); // получаем продукты из категори
        elseif($position == 'brand'):
            $products = Product::where('category_id', $brandId)->whereIn('id', $productsIds)->paginate(9); // получаем продукты бренда
        elseif($position == 'brand-category'):
            $products = Product::where('brand_id', $brandId)->where('category_id', $categoryId)->whereIn('id', $productsIds)->paginate(9); // получаем продукты категории бренда
        endif;

        $cartProducts = session('cart.products'); // продукты в корзине
        $catalogView = session('view.catalog'); // сессия вида каталога

        return response(view('ajax.catalog_filtered', compact('cartProducts', 'catalogView', 'products')));
    }

    public static function filterSession($productsBeforeFiltering) { // получаем продукты в зависимости от категории и бренда
        $productIdsFromLocation = []; // ids полученных продуктов
        foreach ($productsBeforeFiltering as $product) {
            array_push($productIdsFromLocation, $product->id);
        }

        // начало фильтрации
        $valueIdsString = session()->get('catalog.filter');
        $valueIdsArray = explode(',', $valueIdsString);

        $values = []; // значения атрибутов
        foreach ($valueIdsArray as $valueId) {
            array_push($values, AttributeValue::where('id', $valueId)->first());
        }

        $skuArrays = []; // массивы с sku ids у которых минимум один выбранный атрибут
        foreach ($values as $value) {
            array_push($skuArrays, SkuValue::where('attribute_value_id', $value->id)->get());
        }

        $possibleSkuIds = []; // делаем плоский массив возможных sku
        foreach ($skuArrays as $skuArray) {
            foreach ($skuArray as $sku) {
                array_push($possibleSkuIds, $sku->sku_id);
            }
        }

        if(count($skuArrays) > 1) { // если выбранно больше двух атрибутов, оставляем только совпавшие с значениями атрибутов skus
            $skuIds = []; // sku ids
            foreach( array_count_values($possibleSkuIds) as $key => $val ) {
                if ( $val > 1 ) { array_push($skuIds, $key);}
            }
        } else {$skuIds = $possibleSkuIds;}
        $skus = Sku::whereIn('id', $skuIds)->get(); // отфильтрованые skus

        $productIdsFiltered = []; // id продуктов
        foreach ($skus as $sku) {
            array_push($productIdsFiltered, $sku->product_id);
        }

        $products = Product::whereIn('id', $productIdsFromLocation)->whereIn('id', $productIdsFiltered)->paginate(9); // получаем продукты отфильтрованных skus

        return $products;
    }
}
