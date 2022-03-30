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
        $products = Product::select(
            'products.id', 'name', 'name_en', 'code', 'category_id', 'brand_id', 'description', 'description_en', 'description_bottom',
            'description_bottom_en', 'information', 'information_en', 'products.price', 'new', 'sale', 'bestseller',
            'image_1', 'image_2', 'image_3', 'products.created_at', 'products.updated_at', \DB::raw('count(*) as count')
        )
            ->join('skus', 'products.id', '=', 'skus.product_id')
            ->where('category_id', $this->id)
            ->groupBy('products.id')->get();

        /*dump($products);

        $skus = Sku::get();
        $productsIdsWithDubls = [];
        foreach($skus as $sku) {
            array_push($productsIdsWithDubls, $sku->product->id);
        }

        dump($productsIdsWithDubls);

        $productsIdsWithDubls = array_flip(array_flip($productsIdsWithDubls));
        $products = Product::whereIn('id', $productsIdsWithDubls)->where('category_id', $this->id)->get(); // продукты у которых есть торговые предложения
        dd($products);*/

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
