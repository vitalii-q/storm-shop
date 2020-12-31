<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class); // связь с продуктами
    }

    public function skus() {
        return $this->belongsToMany(Sku::class, 'order_sku', 'order_id', 'product_id');
    }

    public function getOptions($skuId) {
        $optionsString = OrderSku::where('order_id', $this->id)->where('product_id', $skuId)->first()->options;
        $options = explode(',', $optionsString);

        $optionNames = []; //
        foreach ($options as $option) { // получаем названия значений элементов
            array_push($optionNames, AttributeValue::where('value', $option)->first()->name);
        }

        return implode(', ', $optionNames);
    }
}
