<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use App\Services\CurrencyConversion;
use App\Services\CurrencyRates;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Sku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use Translatable;

    protected $fillable = [
        'name', 'name_en', 'code', 'category_id', 'brand_id', 'description', 'description_en', 'description_bottom',
        'description_bottom_en', 'information', 'information_en', 'price' , 'image_1', 'image_2', 'image_3',
        'new', 'sale', 'bestseller'
    ];

    public function skus() {
        return $this->hasMany(Sku::class);
    }

    public function attributes() {
        return $this->belongsToMany(Attribute::class, 'attribute_product');
    }

    public function getCategory() { // функция с помощью которой получаем текущую категорию
        return Category::find($this->category_id);
    }

    public static function getCategoryCodeByProductId($id) {
        $categoryInfo = DB::table('products')->select('categories.code')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', '=', $id)
            ->first();

        return $categoryInfo->code; // возвращаем код категории
    }

    public static function getSku($id) {
        return Sku::where('id', $id)->first();
    }

    public function getUserDesire() {
        return Desire::where('user_id', Auth::user()->id)->where('product_id', $this->id)->first();
    }

    public function currency() {
        return CurrencyConversion::convert($this->price);
    }

    public static function getProductStockBalance($id) {
        // получаем колличества каждого торгового предложения продукта
        $skus = DB::table('products')->select('products.id', 'name', 'quantity')
            ->join('skus', 'products.id', '=', 'skus.product_id')
            ->where('product_id', '=', $id)
            ->get();

        // высчитываем общее количество торговых предложений в наличии
        $quantity = 0;
        foreach ($skus as $sku) {
            $quantity = $quantity + $sku->quantity;
        }

        return $quantity;
    }
}
