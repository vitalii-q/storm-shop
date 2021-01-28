<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use Translatable;

    protected $table = "attributes";

    protected $fillable = ['name', 'name_en', 'code', 'is_filterable', 'is_required'];

    public function attributeValues() {
        return $this->hasMany(AttributeValue::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
