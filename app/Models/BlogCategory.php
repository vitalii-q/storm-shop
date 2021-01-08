<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use Translatable;

    protected $fillable = ['name', 'name_en', 'code', 'description', 'description_en', 'image'];

    public function getArticles() {
        return Blog::where('category_id', $this->id);
    }
}
