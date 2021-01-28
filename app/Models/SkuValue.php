<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkuValue extends Model
{
    protected $table = "sku_value";

    protected $fillable = ['attribute_value_id', 'sku_id'];

    public function sku() {
        return $this->belongsTo(Sku::class);
    }

    public function attributeValue() {
        return $this->belongsTo(AttributeValue::class);
    }
}
