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

    public static function getProductAttributeValuesId($product) {
        $productAttributeValues = AttributeValue::select('attribute_value.id', \DB::raw('count(*) as count'))
            ->join('sku_value', 'sku_value.attribute_value_id', '=', 'attribute_value.id')
            ->join('skus', 'sku_id', '=', 'skus.id')
            ->join('products', 'products.id', '=', 'product_id')
            ->where('products.id', $product->id)
            ->groupBy('attribute_value.id')->get();

        $productAttributeValuesId = [];
        foreach ($productAttributeValues as $productAttributeValue) {
            if(!in_array($productAttributeValue->id, $productAttributeValuesId)) {
                array_push($productAttributeValuesId, $productAttributeValue->id);
            }
        }

        return $productAttributeValuesId;
    }
}
