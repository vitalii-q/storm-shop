<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public function getArticles() {
        return Blog::where('category_id', $this->id);
    }
}
