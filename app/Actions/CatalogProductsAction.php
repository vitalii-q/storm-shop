<?php

namespace App\Actions;

use App\Contracts\Actions;
use App\Http\Controllers\FilterController;
use App\Models\Product;
use App\Models\Sku;

class CatalogProductsAction implements Actions
{
    public function handle($selected_category = null, $selected_brand = null)
    {}
}
