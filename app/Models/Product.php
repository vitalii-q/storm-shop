<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    public function getCategory() { // функция с помощью которой получаем текущую категорию
        return Category::find($this->category_id);
    }
}
