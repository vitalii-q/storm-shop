<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
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
        return view('index', compact('sliders', 'advantages'));
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

        $products = Product::where('category_id', $selected_category->id)->paginate(9); // привязанные к категории продукты
        $cartProducts = session('cart.products'); // продукты в корзине

        return view('category', compact( 'categories', 'selected_category', 'products', 'cartProducts'));
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
        $products = Product::where('brand_id', $selected_brand->id)->where('category_id', $selected_category->id)->paginate(9);
        $cartProducts = session('cart.products'); // продукты в корзине

        return view('brand', compact(  'categories','brands', 'selected_brand', 'selected_category', 'products', 'cartProducts'));
    }
    public function product($selected_category, $selected_product) {
        $selected_product = Product::where('code', $selected_product)->first(); // выбранный продукт

        $cartProducts = session('cart.products'); // продукты в корзине

        return view('product', compact('selected_product', 'cartProducts'));
    }

    public function about() {
        $team = DB::table('team')->get();
        return view('about', compact('team'));
    }

    public function blog() {
        $blog = Blog::paginate(5);
        $blogCategories = BlogCategory::get();

        return view('blog', compact('blog', 'blogCategories'));
    }
    public function blogCategory($selected_category) {
        $selected_category = BlogCategory::where('code', $selected_category)->first(); // выбранная категория
        $blog = Blog::where('category_id', $selected_category->id)->paginate(5); // статьи привязанные к категории
        $blogCategories = BlogCategory::get(); // все категории

        return view('blog', compact('blog', 'blogCategories'));
    }
    public function article($article) {
        $article = Blog::where('code', $article)->first();
        $blogCategories = BlogCategory::get();

        return view('blog_detail', compact('article', 'blogCategories'));
    }

    public function contacts() {
        return view('contacts');
    }
}
