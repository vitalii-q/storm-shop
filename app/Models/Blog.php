<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Translatable;

    protected $table = "blog";

    protected $fillable = ['title', 'title_en', 'preview_text', 'preview_text_en', 'text', 'text_en', 'code', 'category_id', 'user_id', 'image'];

    public function comments() {
        return $this->hasMany(BlogComment::class, 'article_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
