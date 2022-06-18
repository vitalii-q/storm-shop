<?php

namespace App\Foundation;

use App\Contracts\CatalogDesiresInterface;
use App\Models\Desire;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CatalogDesires implements CatalogDesiresInterface
{
    public function __invoke()
    {
        if(Auth::check()) {
            $desiresIds = Desire::where('user_id', Auth::user()->id)->select('product_id')->get(); // желания пользователя
            $desires = Product::whereIn('id', $desiresIds)->orderBy('id', 'desc')->get()->reverse();
            if(count($desires) > 3) {$desires = $desires->random(3);}
        } else { $desires = []; }

        return $desires;
    }
}
