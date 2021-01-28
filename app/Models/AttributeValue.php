<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use Translatable;

    protected $table = "attribute_value";

    protected $fillable = ['name', 'name_en', 'value', 'attribute_id'];

    public function attribute() {
        return $this->belongsTo(Attribute::class);
    }

    public function skuValues() {
        return $this->hasMany(SkuValue::class);
    }
}
