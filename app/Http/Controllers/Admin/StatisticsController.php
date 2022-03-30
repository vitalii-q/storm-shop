<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function index() {
        // получаем продукты которые покупали лучше всего за все время
        $bestsellers = \DB::table('orders')->select('products.id', 'name', 'code', \DB::raw('count(*) as count'))
            ->join('order_sku', 'order_sku.order_id', '=', 'orders.id')
            ->join('skus', 'skus.id', '=', 'order_sku.product_id')
            ->join('products', 'products.id', '=', 'skus.product_id')
            ->groupBy('products.id')
            ->orderByDesc('count')
            ->limit(10)->get();

        return view('admin.statistics', compact('bestsellers'));
    }
}
