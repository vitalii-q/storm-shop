<?php

namespace App\Http\Controllers;

use App\Contracts\Video\VideoHosting;
use App\Foundation\CatalogDesires;
use App\Foundation\CatalogProducts;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Sku;
use App\Models\Team;
use App\Services\FaceService;
use App\Services\Video\Youtube;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MainSlider;
use App\Models\Advantage;

class MainController extends Controller
{
    public function index() {
        $sliders = Cache::remember('MainSlider', Carbon::now()->addMinutes(60), function () {
            return MainSlider::get(); // получаем слайдеры на главной странице
        });

        $advantages = Cache::remember('Advantage', Carbon::now()->addMinutes(60), function () {
            return Advantage::get(); // получаем преимущества
        });

        if(!$productsWithSkus = Cache::tags('catalog')->get('ProductsWithSkus')) {
            Cache::tags('catalog')->put('ProductsWithSkus',  Sku::getProductsWithSkus(), Carbon::now()->addMinutes(60));
            $productsWithSkus = Cache::tags('catalog')->get('ProductsWithSkus');
        }

        $sales = Product::whereIn('id', $productsWithSkus)->where('sale', 1)->get()->random(4); // скидки
        $bestsellers = Product::whereIn('id', $productsWithSkus)->where('bestseller', 1)->get()->random(4); // бестселлеры
        $news = Product::whereIn('id', $productsWithSkus)->where('new', 1)->get()->random(4); // новинки

        return view('index', compact('sliders', 'advantages', 'sales', 'bestsellers', 'news'));
    }

    public function catalog(CatalogProducts $productsAction, CatalogDesires $catalogDesires) {
        $categories = Category::get(); // все категории
        $brands = Brand::get(); // все брэнды
        $attributes = Attribute::get(); // все атрибуты
        $products = $productsAction->get(); // все продукты | если установлен фильтр, подгружает отфильтрованные продукты

        $cartProducts = session('cart.products'); // продукты в корзине
        $catalogView = session('view.catalog'); // сессия вида каталога

        $desires = $catalogDesires(); // __invoke

        return view('catalog', compact('catalogView','categories','brands', 'products', 'cartProducts', 'attributes', 'desires'));
    }

    public function category($selected_category, CatalogProducts $productsAction, CatalogDesires $catalogDesires) {
        $categories = Category::get(); // все категории
        $brands = Brand::get(); // все брэнды
        $attributes = Attribute::get(); // все атрибуты

        $selected_category = Category::where('code', $selected_category)->first(); // выбранная категория
        if (!$selected_category) { abort(404); } // error 404

        $products = $productsAction->get($selected_category); // все продукты | если установлен фильтр, подгружает отфильтрованные продукты

        $cartProducts = session('cart.products'); // продукты в корзине
        $catalogView = session('view.catalog'); // сессия вида каталога

        $desires = $catalogDesires(); // __invoke

        return view('category', compact( 'catalogView','categories', 'brands', 'selected_category', 'products', 'cartProducts', 'attributes', 'desires'));
    }

    public function brand($selected_brand, CatalogProducts $productsAction, CatalogDesires $catalogDesires) {
        $brands = Brand::get(); // все брэнды
        $attributes = Attribute::get(); // все атрибуты
        $selected_brand = Brand::where('code', $selected_brand)->first(); // выбранный брэнд

        $categories = $selected_brand->getCategories(); // катигории относящиеся к бренду

        $products = $productsAction->get($selected_category = null, $selected_brand); // все продукты | если установлен фильтр, подгружает отфильтрованные продукты

        $cartProducts = session('cart.products'); // продукты в корзине
        $catalogView = session('view.catalog'); // сессия вида каталога

        $desires = $catalogDesires(); // __invoke

        return view('brand', compact(  'catalogView', 'categories','brands', 'selected_brand', 'products', 'cartProducts', 'attributes', 'desires'));
    }

    public function brandCategory($selected_brand, $selected_category, CatalogProducts $productsAction, CatalogDesires $catalogDesires) {
        $brands = Brand::get(); // все брэнды
        $attributes = Attribute::get(); // все атрибуты
        $selected_brand = Brand::where('code', $selected_brand)->first(); // выбранный брэнд

        $categories = $selected_brand->getCategories(); // катигории относящиеся к бренду
        $selected_category = Category::where('code', $selected_category)->first();
        if (!$selected_category) { abort(404); } // error 404

        $products = $productsAction->get($selected_category, $selected_brand); // все продукты | если установлен фильтр, подгружает отфильтрованные продукты

        $cartProducts = session('cart.products'); // продукты в корзине
        $catalogView = session('view.catalog'); // сессия вида каталога

        $desires = $catalogDesires(); // __invoke

        return view('brand', compact(  'catalogView', 'categories','brands', 'selected_brand', 'selected_category', 'products', 'cartProducts', 'attributes', 'desires'));
    }

    public function product($selected_category, $selected_product) {
        $selected_product = Product::where('code', $selected_product)->first(); // выбранный продукт
        if (!$selected_product) { abort(404); } // error 404

        $cartProducts = session('cart.products'); // продукты в корзине

        // получаем аттрибуты и значения продукта
        $attributes = []; // аттрибуты продукта
        $productAttributeValuesId = []; // id значений атрибутов продукта
        foreach ($selected_product->skus as $sku) {
            foreach ($sku->skuValues as $value) {
                if(!in_array($value->attributeValue->attribute, $attributes)) { // если в массиве аттрибутов нет такого атрибута
                    array_push($attributes, $value->attributeValue->attribute); // вкладываем аттрибут в массив аттрибутов
                }

                array_push($productAttributeValuesId, $value->attributeValue->id);
            }
        }

        $productsWithSkus = Sku::getProductsWithSkus();
        $related = Product::whereIn('id', $productsWithSkus)->where('category_id', $selected_product->category_id)->get()->except($selected_product->id); // пожожие товары
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
            foreach ($sku->skuValues as $value) {
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

        $test = [$valuesWithSelectedValue, $valueIds]; // массивы(1: с выбранными значениями 2: с id комбинируемыми значениями)

        return response(json_encode($test)); // ответ в js
    }

    public function about() {
        $team = Team::get();
        return view('about', compact('team'));
    }

    public function contacts() {
        return view('contacts');
    }

    public function changeLocale(Request $request) {
        if($request['locale'] == 'en') { $locale = 'en'; } elseif($request['locale'] == 'ru') { $locale = 'ru'; }
        session()->put('locale', $locale);

        App::setLocale($locale);

        return redirect()->back();
    }

    public function changeCurrency(Request $request) {
        session()->put('currency', $request['currency']);

        return redirect()->back();
    }

    public function catalogView(Request $request) {
        session()->put('view.catalog', $request['view']); // сохраняем выбранный вид каталога в сессию
        return response($request['view']); // ответ в js
    }


    // ---------------- тестовые
    public function tests() {
        return view('tests');
    }

    public function testsCheckForm(Request $request) {
        return response('true');
    }
    public function testsForm(Request $request) {
        return 'done';
    }
    // ---------------- тестовые
}
