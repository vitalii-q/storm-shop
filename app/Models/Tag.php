<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    protected $fillable = ['name', 'name_en', 'code'];

    public function articles() {
        return $this->belongsToMany(Blog::class);
    }
}
