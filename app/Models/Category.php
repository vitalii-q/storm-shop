<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $fillable = ['name', 'name_en', 'code', 'description', 'description_en', 'image'];

    public function getProducts() { // функция с помощью которой получаем текущие продукты
        return Product::where('category_id', $this->id)->get();
    }

    public function getBrandCategoryProducts($brandId) {
        return  Product::where('category_id', $this->id)->where('brand_id', $brandId)->get();
    }
}
