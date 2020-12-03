<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\MainSlider;
use App\Models\Advantage;

class MainController extends Controller
{
    public function index() {
        $sliders = MainSlider::get(); // получаем слайдеры на главной странице
        $advantages = Advantage::get(); // получаем преимущества
        return view('index', compact('sliders', 'advantages'));
    }

    public function catalog() {
        $categories = Category::get(); // все категории
        $products = Product::paginate(6); // все продукты

        $cartProducts = session('cart.products'); // продукты в корзине

        return view('catalog', compact('categories', 'products', 'cartProducts'));
    }
    public function category($selected_category) {
        $categories = Category::get(); // все категории
        $selected_category = Category::where('code', $selected_category)->first(); // выбранная категория
        $products = Product::where('category_id', $selected_category->id)->paginate(6); // привязанные к категории продукты
        return view('category', compact( 'categories', 'selected_category', 'products'));
    }
    public function product($selected_category, $selected_product) {
        $selected_product = Product::where('code', $selected_product)->first(); // выбранный продукт

        $cartProducts = session('cart.products'); // продукты в корзине

        return view('product', compact('selected_product', 'cartProducts'));
    }
}
