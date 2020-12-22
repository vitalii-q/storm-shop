<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Sku;
use App\Models\SkuValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MainSlider;
use App\Models\Advantage;

class MainController extends Controller
{
    public function index() {
        $sliders = MainSlider::get(); // получаем слайдеры на главной странице
        $advantages = Advantage::get(); // получаем преимущества

        $sales = Product::where('sale', 1)->get()->random(4); // скидки
        $bestsellers = Product::where('bestseller', 1)->get()->random(4); // бестселлеры
        $news = Product::where('new', 1)->get()->random(4); // новинки

        return view('index', compact('sliders', 'advantages', 'sales', 'bestsellers', 'news'));
    }

    public function catalog() {
        $categories = Category::get(); // все категории
        $brands = Brand::get(); // все брэнды
        $products = Product::paginate(9); // все продукты

        $cartProducts = session('cart.products'); // продукты в корзине

        return view('catalog', compact('categories','brands', 'products', 'cartProducts'));
    }
    public function category($selected_category) {
        $categories = Category::get(); // все категории
        $selected_category = Category::where('code', $selected_category)->first(); // выбранная категория
        if (!$selected_category) { abort(404); } // error 404

        $brands = Brand::get(); // все брэнды

        $products = Product::where('category_id', $selected_category->id)->paginate(9); // привязанные к категории продукты
        $cartProducts = session('cart.products'); // продукты в корзине

        return view('category', compact( 'categories', 'brands', 'selected_category', 'products', 'cartProducts'));
    }
    public function brand($selected_brand) {
        $brands = Brand::get(); // все брэнды
        $selected_brand = Brand::where('code', $selected_brand)->first(); // выбранный брэнд

        $categories = $selected_brand->getCategories(); // катигории относящиеся к бренду
        $products = Product::where('brand_id', $selected_brand->id)->paginate(9);
        $cartProducts = session('cart.products'); // продукты в корзине

        return view('brand', compact(  'categories','brands', 'selected_brand', 'products', 'cartProducts'));
    }
    public function brandCategory($selected_brand, $selected_category) {
        $brands = Brand::get(); // все брэнды
        $selected_brand = Brand::where('code', $selected_brand)->first(); // выбранный брэнд

        $categories = $selected_brand->getCategories(); // катигории относящиеся к бренду
        $selected_category = Category::where('code', $selected_category)->first();
        if (!$selected_category) { abort(404); } // error 404

        $products = Product::where('brand_id', $selected_brand->id)->where('category_id', $selected_category->id)->paginate(9);
        $cartProducts = session('cart.products'); // продукты в корзине

        return view('brand', compact(  'categories','brands', 'selected_brand', 'selected_category', 'products', 'cartProducts'));
    }
    public function product($selected_category, $selected_product) {
        $selected_product = Product::where('code', $selected_product)->first(); // выбранный продукт
        if (!$selected_product) { abort(404); } // error 404

        $cartProducts = session('cart.products'); // продукты в корзине

        // получаем аттрибуты и значения продукта
        $attributes = []; // аттрибуты продукта
        $productAttributeValuesId = []; // id значений атрибутов продукта
        foreach ($selected_product->skus as $sku) {
            foreach ($sku->skuValue as $value) {
                if(!in_array($value->attributeValue->attribute, $attributes)) { // если в массиве аттрибутов нет такого атрибута
                    array_push($attributes, $value->attributeValue->attribute); // вкладываем аттрибут в массив аттрибутов
                }

                array_push($productAttributeValuesId, $value->attributeValue->id);
            }
        }

        $related = Product::where('category_id', $selected_product->category_id)->get()->except($selected_product->id); // пожожие товары
        if(count($related) >= 4) {
            $related = $related->random(4);
        }

        return view('product', compact('selected_product', 'cartProducts', 'attributes', 'productAttributeValuesId', 'related'));
    }
    public function sku(Request $request) {
        $productId = json_decode($request['productId']);
        $product = Product::where('id', $productId)->first();

        $valueId = json_decode($request['valueId']);
        $attributeValue = AttributeValue::where('id', $valueId)->first(); // свойство торгового предложения

        $skusCombinations = []; // массив комбинаций торгового предложения
        foreach ($product->skus as $sku) {
            $skuValues = []; // массив значений торгового предложения
            foreach ($sku->skuValue as $value) {
                array_push($skuValues, $value->attributeValue->value);
            }
            array_push($skusCombinations,  $skuValues);
        }

        // формируем массив sku которые в комбинации с выбранным свойством
        $valuesCombination = [];
        foreach ($skusCombinations as $skuCombination) {
            if(in_array($attributeValue->value, $skuCombination)) {
                array_push($valuesCombination, $skuCombination);
            }
        }

        // формируем массив свойств которые в комбинации с выбранным свойством
        $valuesWithSelectedValue = [];
        foreach ($valuesCombination as $valueCombination) {
            foreach ($valueCombination as $value){
                if(!in_array($value, $valuesWithSelectedValue)) {
                    array_push($valuesWithSelectedValue, $value);
                }
            }
        }


        // ==============================
        /*$array = [];
        foreach ($valuesCombination as $valueCombination) {
            unset($valueCombination[array_search($attributeValue->value, $valueCombination)]);
            array_push($array, $valueCombination);

        }*/

        // получаем массив значений которые в комбинации с выбранным, но не выбранны
        $arrayWithValue = [];
        foreach ($valuesCombination as $valueCombination) {
            foreach ($valueCombination as $valueCombinationValue) {
                if($valueCombinationValue != $attributeValue->value) {
                    array_push($arrayWithValue, $valueCombinationValue);
                }
            }
        }

        // получаем id значений которые в комбинации с выбранным, но не выбранны
        $valueIds = [];
        foreach ($arrayWithValue as $arrayWithValueElem) {
            array_push($valueIds, AttributeValue::where('value', $arrayWithValueElem)->first()->id);
        }

        $test = [$valuesWithSelectedValue, $valueIds];

        //return response(json_encode($valuesWithSelectedValue)); // ответ в js

        // получаем значения атрибута привязанные к выбранному значению атрибута =====================



        return response(json_encode($test)); // ответ в js
    }
    public function getAttributeValues() {

    }

    public function about() {
        $team = DB::table('team')->get();
        return view('about', compact('team'));
    }

    public function contacts() {
        return view('contacts');
    }
}
