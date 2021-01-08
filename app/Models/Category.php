<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['name', 'name_en', 'code', 'description', 'description_en', 'image'];

    public function getSkus() {
        $skus = Sku::get();
        $productsIdsWithDubls = [];
        foreach($skus as $sku) {array_push($productsIdsWithDubls, $sku->product->id);}
        $productsIdsWithDubls = array_flip(array_flip($productsIdsWithDubls));
        $products = Product::whereIn('id', $productsIdsWithDubls)->where('category_id', $this->id)->get(); // продукты у которых есть торговые предложения

        return $products;
    }

    public function getBrandCategorySkus($brandId) {
        $skus = Sku::get();
        $productsIdsWithDubls = [];
        foreach($skus as $sku) {array_push($productsIdsWithDubls, $sku->product->id);}
        $productsIdsWithDubls = array_flip(array_flip($productsIdsWithDubls));
        $products = Product::whereIn('id', $productsIdsWithDubls)->where('category_id', $this->id)->where('brand_id', $brandId)->get(); // продукты у которых есть торговые предложения

        return $products;
    }
}
