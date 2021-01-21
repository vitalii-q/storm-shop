<?php

namespace App\Http\Controllers;

use App\Models\Desire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class DesiresController extends Controller
{
    public function index($id) {
        $user = User::where('id', $id)->first();
        $orders = Order::where('user_id', Auth::user()->id)->get();

        // получаем продукты которые в желаниях пользователя и сортируем
        $desiresTable = Desire::where('user_id', Auth::user()->id)->get();
        $desiresNateIds = [];
        foreach ($desiresTable as $desireNote) {
            array_push($desiresNateIds, $desireNote['product_id']);
        }
        $desires = Product::whereIn('id', $desiresNateIds)->orderBy('created_at', 'desc')->get(); // работает сорт по id

        $personalView = session('view.personal');

        return view('personal.personal', compact('personalView','user', 'orders', 'desires'));
    }

    public function desire(Request $request) { // добавление / удаление желания
        $productId = json_decode($request['productId']);
        $desire = Desire::where('user_id', Auth::user()->id)->where('product_id', $productId)->first();

        if($desire == null) {
            Desire::create([
                'user_id' => Auth::user()->id,
                'product_id' => $productId,
            ]);
            $response = 'add';
        } else {
            $desire->delete();
            $response = 'delete';
        }

        return response(json_encode($response));
    }
}
