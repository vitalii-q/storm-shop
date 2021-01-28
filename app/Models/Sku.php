<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $fillable = ['product_id', 'price', 'quantity'];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function skuValues() {
        return $this->hasMany(SkuValue::class);
    }

    public static function getSelectedSku($productId, $selectedAttrValuesArray) { // получаем выбранный sku
        $selectedAttrValueModelsArray = []; // массив с ids выбранных attribute_value
        foreach ($selectedAttrValuesArray as $selectedAttrValue) {
            array_push( $selectedAttrValueModelsArray, AttributeValue::where('value', $selectedAttrValue)->first());
        }

        $possibleSkus = []; // массив с моделями подходящих sku (по всем продуктам)
        foreach ($selectedAttrValueModelsArray as $skuValueModel) {
            foreach ($skuValueModel->skuValues as $skuValue) {
                array_push($possibleSkus, $skuValue->sku);
            }
        }

        $productPossibleSkus = [];// массив с моделями возможных sku (выбранного продукта)
        foreach ($possibleSkus as $possibleSku) {
            if($possibleSku->product_id == $productId) {
                array_push($productPossibleSkus, $possibleSku);
            }
        }

        $productPossibleSkuIds = []; // массив с ids возмежных sku (выбранного продукта)
        foreach ($productPossibleSkus as $productPossibleSku) {
            array_push($productPossibleSkuIds, $productPossibleSku->id);
        }

        // находим дубль, он же и является id выбранного sku
        $skuId = array_flip(array_count_values($productPossibleSkuIds));
        $sku = Sku::where('id', $skuId[2])->first(); // выбранный sku

        return $sku;
    }

    public function quantity($order_id) {
        return OrderSku::where('product_id', $this->id)->where('order_id', $order_id)->first()->count;
    }

    public static function getProductsWithSkus() {
        $allSkus = Sku::get();

        $productsIds = []; // id продуктов с торговыми предложениями
        foreach ($allSkus as $sku) {
            if(!in_array($sku->product_id, $productsIds)) {
                array_push($productsIds, $sku->product_id);
            }
        }

        return $productsIds;
    }

    public static function SkuExistenceCheck($product, $verifiableAttributesValues) {
        $skuAlreadyExists = false;

        $skusInDB = []; // существующие sku атрибуты продукта
        foreach ($product->skus as $sku) {
            $attributesValues = [];
            foreach ($sku->skuValues as $skuValue) {
                array_push($attributesValues, $skuValue->attributeValue->id);
            }
            array_push( $skusInDB, $attributesValues);
        }

        foreach ($skusInDB as $skuInDB) {
            if(empty(array_diff($verifiableAttributesValues, $skuInDB) == true)) { // сравнение ids в массивахс значениями атрибутов
                $skuAlreadyExists = true;
            }
        }

        return $skuAlreadyExists;
    }
}

