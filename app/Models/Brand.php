<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    public function getProducts() {
        return Product::where('brand_id', $this->id)->get();
    }

    public function getCategories() {
        $brandProducts = Product::where('brand_id', $this->id)->get(); // этот брэнд

        $brands = [];
        foreach ($brandProducts as $brandProduct) { // ищем относящиеся к нему категории
            array_push($brands, $brandProduct->getCategory());
        }
        $brands = array_unique($brands); // убираем дублирующиеся

        return $brands;
    }
}
