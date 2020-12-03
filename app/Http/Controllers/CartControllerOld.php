<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartControllerOld extends Controller
{
    public function cart() {
        $cart_items = \Cart::getContent();
        return view('cart', compact('cart_items', 'items_quantities'));
    }

    public function add(Product $product) { // получаем продукт через модель
        \Cart::add(array( // add the product to cart
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1, // колличество
            'attributes' => array(
                'image' => $product->image_1,
            ), // цвет, размер
            'associatedModel' => $product
        ));

        return redirect()->back();
        //return response()->json(['id' => $request->id]); // ajax
    }

    public function remove($item_id) {
        \Cart::remove($item_id);

        return redirect()->back();
    }

    public function update(Request $request) {
        $cart_items = \Cart::getContent();
        $i = 0; foreach ($cart_items as $cart_item) {
            \Cart::update($cart_item->id, [
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantities[$i],
                )
            ]); $i++;
        }

        return response($request->quantities[0]); // ответ в js
    }

    public function clear() {
        \Cart::clear();
        return redirect()->back();
    }

    public function checkout() {
        $cart_items = \Cart::getContent();
        return view('checkout', compact('cart_items'));
    }

    public function buy(Request $request) {
        if(Auth::check() == true) {
            if(Auth::user()->last_name != null and Auth::user()->phone != null) {
                $request->validate([
                    'shipping_city' => ['required'],
                    'shipping_street' => ['required'],
                    'shipping_apartment' => ['required'],
                    'message' => ['max:500'],
                ]);
            } else {
                $request->validate([
                    'first_name' => ['required', 'max:100'],
                    'last_name' => ['required', 'max:100'],
                    'phone' => ['required'],
                    'shipping_city' => ['required'],
                    'shipping_street' => ['required'],
                    'shipping_apartment' => ['required'],
                    'message' => ['max:500'],
                ]);
            }
        } else {
            $request->validate([
                'first_name' => ['required', 'max:100'],
                'last_name' => ['required', 'max:100'],
                'email' => ['required'],
                'phone' => ['required'],
                'shipping_city' => ['required'],
                'shipping_street' => ['required'],
                'shipping_apartment' => ['required'],
                'message' => ['max:500'],
            ]);
        }

        /* Создаем заказ ------------------------------------------ */
        $order = new Order();

        $order->status = 1;
        if(Auth::check()): $order->user_id = Auth::user()->id; endif;

        $order->first_name = $request->input('first_name') ? $request->input('first_name') : Auth::user()->first_name;
        $order->last_name = $request->input('last_name') ? $request->input('last_name') : Auth::user()->last_name;
        $order->phone = $request->input('phone') ? $request->input('phone') : Auth::user()->Auth::user()->phone;
        $order->email = $request->input('email') ? $request->input('email') : Auth::user()->Auth::user()->email;

        $order->currency_id = 1; // настроить
        $order->sum = \Cart::getTotal();

        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_street = $request->input('shipping_street');
        $order->shipping_apartment = $request->input('shipping_apartment');

        $order->message = $request->input('message');

        $order->payment_method = 'cash_payment'; // настроить

        $order->save(); // сохраняем заказ в БД

        /* создаем order_connector -------------------------------------------- */
        $order = Order::find($order->id)->products();
        $cart_products = \Cart::getContent();
        foreach ($cart_products as $cart_product) {
            $order->attach($cart_product->id, ['count' => $cart_product->quantity]);
        }

        return '';
    }
}
