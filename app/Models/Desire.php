<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desire extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
