<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    public function getProducts() { // функция с помощью которой получаем текущие продукты
        return Product::where('category_id', $this->id)->get();
    }
}
