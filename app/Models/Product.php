<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    protected $fillable = ['name', 'name_en', 'code', 'category_id', 'brand_id', 'description', 'description_en', 'description_bottom', 'description_bottom_en', 'information', 'information_en', 'price' , 'image_1', 'image_2', 'image_3'];

    public function getCategory() { // функция с помощью которой получаем текущую категорию
        return Category::find($this->category_id);
    }
}
