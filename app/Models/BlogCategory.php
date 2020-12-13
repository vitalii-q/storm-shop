<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = ['name', 'name_en', 'code', 'description', 'description_en', 'image'];

    public function getArticles() {
        return Blog::where('category_id', $this->id);
    }
}
