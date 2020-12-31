<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    protected $fillable = ['name', 'name_en', 'code', 'description', 'description_en', 'image'];

    /*public function getProducts() {
        return Product::where('brand_id', $this->id)->get();
    }*/

    public function getSkus() {
        $skus = Sku::get();
        $productsIdsWithDubls = [];
        foreach($skus as $sku) {array_push($productsIdsWithDubls, $sku->product->id);}
        $productsIdsWithDubls = array_flip(array_flip($productsIdsWithDubls));
        $products = Product::whereIn('id', $productsIdsWithDubls)->where('brand_id', $this->id)->get(); // продукты у которых есть торговые предложения

        return $products;
    }

    public function getCategories() {
        $skus = Sku::get();
        $productsIdsWithDubls = [];
        foreach($skus as $sku) {array_push($productsIdsWithDubls, $sku->product->id);}
        $productsIdsWithDubls = array_flip(array_flip($productsIdsWithDubls));
        $brandProducts = Product::whereIn('id', $productsIdsWithDubls)->where('brand_id', $this->id)->get(); // продукты у которых есть торговые предложения

        $brands = [];
        foreach ($brandProducts as $brandProduct) { // ищем относящиеся к нему категории
            array_push($brands, $brandProduct->getCategory());
        }
        $brands = array_unique($brands); // убираем дублирующиеся

        return $brands;
    }
}
