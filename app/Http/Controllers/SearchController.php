<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\App;

class SearchController extends Controller
{
    public function index(Request $request){
        //dd($request);
        if(isset($request['search']) and $request['search'] != null){
            if(App::getLocale() == 'en') {
                if(iconv_strlen($request['search']) <= 3) {
                    $foundProducts = Product::where('name_en', 'like', '%'.$request['search'].'%')->get();
                    $foundArticles = Blog::where('title_en', 'like', '%'.$request['search'].'%')->get();
                } elseif (iconv_strlen($request['search']) == 4) {
                    $foundProducts = Product::where('name_en', 'like', '%'.mb_substr($request['search'], 0, -1).'%')->get();
                    $foundArticles = Blog::where('title_en', 'like', '%'.mb_substr($request['search'], 0, -1).'%')->get();
                } else {
                    $foundProducts = Product::where('name_en', 'like', '%'.mb_substr($request['search'], 0, -2).'%')->get();
                    $foundArticles = Blog::where('title_en', 'like', '%'.mb_substr($request['search'], 0, -2).'%')->get();
                }
            } else {
                if(iconv_strlen($request['search']) <= 3) {
                    $foundProducts = Product::where('name', 'like', '%'.$request['search'].'%')->get();
                    $foundArticles = Blog::where('title', 'like', '%'.$request['search'].'%')->get();
                } elseif (iconv_strlen($request['search']) == 4) {
                    $foundProducts = Product::where('name', 'like', '%'.mb_substr($request['search'], 0, -1).'%')->get();
                    $foundArticles = Blog::where('title', 'like', '%'.mb_substr($request['search'], 0, -1).'%')->get();
                } else {
                    $foundProducts = Product::where('name', 'like', '%'.mb_substr($request['search'], 0, -2).'%')->get();
                    $foundArticles = Blog::where('title', 'like', '%'.mb_substr($request['search'], 0, -2).'%')->get();
                }
            }
        }

        $searchView = session('view.search');
        return view('search', compact('searchView', 'foundProducts', 'foundArticles'));
    }

    public function searchView(Request $request) {
        session()->put('view.search', $request['view']); // сохраняем выбранный вид каталога в сессию
        return response($request['view']); // ответ в js
    }
}
