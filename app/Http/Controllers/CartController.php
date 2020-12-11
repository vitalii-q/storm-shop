<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cart() {
        $products = session('cart.products');
        return view('cart', compact('products'));
    }

    //public function add(Request $request, Product $product) { // получаем продукт через модель
    public function add(Request $request) { // получаем продукт через модель // ajax
        // получаем продукт из БД
        $productId = json_decode($request['id']);
        $productQuantity = json_decode($request['quantity']);
        $product = DB::table('products')->where('id', $productId)->first();

        // сохраняем id пользователя в сессию или закаем уникальный
        $cart = session('cart');
        if(is_null($cart)) {
            if(Auth::check()) {
                $cart = session(['cart.id' => Auth::user()->id]);
            } else {
                $cart = session(['cart.id' => uniqid()]);
            }
        }

        // проверка наличия продукта в корзине
        $productInCart = false; // true если добавляемый продукт уже есть в корзине
        if(session()->has('cart.products')) {
            foreach ($cart['products'] as $cartProductKey => $cartProduct) {
                if($cartProduct['id'] == $product->id) {$productInCart = true;}
            }
        }

        if ($productInCart == true) { // если добавляемый предмет уже есть в корзине
            $cartOld = session('cart.products'); // старая корзинв
            $cartNew = []; // формируем новую корзину из сессии в виде массива
            foreach ($cartOld as $cartProductOld) {
                array_push($cartNew, $cartProductOld);
            }

            // обновление продукта в корзине
            foreach ($cartNew as $cartProductKey => $cartProduct) { // поиск в корзине обновляемого продукта
                if($cartProduct['id'] == $product->id) {
                    $cartProductUpdate = [ // массив нового продукта
                        "id" => $product->id,
                        "quantity" => $cartProduct['quantity'] + $productQuantity,

                        "name" => $product->name,
                        "category_id" => $product->category_id,
                        "price" => $product->price,
                        "image_1" => $product->image_1,
                    ];
                    unset($cartNew[$cartProductKey]); // удаляем массив старого продукта
                }
            }
            array_unshift($cartNew, $cartProductUpdate); // добавляем обновляемый продукт в начало корзины
            session()->put('cart.products', $cartNew); // записываем новую корзину в сессию
        } else { // добавляем новый предмет в корзину
            $cartProduct = [ // формируем массив продукта
                "id" => $product->id,
                "quantity" => $productQuantity,

                "name" => $product->name,
                "category_id" => $product->category_id,
                "price" => $product->price,
                "image_1" => $product->image_1,
            ];

            if(session()->has('cart.products')) { // если в сессии уже есть массив с продуктами
                $cartOld = session('cart.products'); // старая корзинв
                $cartNew = []; // формируем новую корзину из сессии в виде массива
                foreach ($cartOld as $cartProductOld) {
                    array_push($cartNew, $cartProductOld);
                }
                array_unshift($cartNew, $cartProduct); // добавляем продукт в начало новой корзины
                session()->put('cart.products', $cartNew); // записавыем новую корзину в сессию
            } else { // если в сессии нет массива с продуктами
                session()->push('cart.products', $cartProduct); // кладем в сессию продукт
            }
        }

        return response(json_encode($product->id)); // ответ в js
    }

    public function remove(Request $request) {
        $productId = json_decode($request['id']);
        $products = session('cart.products');
        foreach ($products as $productKey => $product) {
            if($product['id'] == $productId) {
                session()->forget('cart.products.'.$productKey);
            }
        }

        return response($request['id']); // ответ в js
    }

    public function update(Request $request) {
        $productId = json_decode($request['id']); // поучаем id продукта
        $quantity = json_decode($request['quantity']); // получаем количество продукта
        $products = session('cart.products'); // получаем продукты которые в корзине
        $i = 0; foreach ($products as $productKey => $product) {
            if($product['id'] == $productId) { // если это обновляемый продукт
                $cartProductUpdate = [
                    "id" => $product['id'],
                    "quantity" => $quantity,

                    "name" => $product['name'],
                    "category_id" => $product['category_id'],
                    "price" => $product['price'],
                    "image_1" => $product['image_1'],
                ];
            } else { // если это не обновляемый продукт
                $cartProductUpdate = [
                    "id" => $product['id'],
                    "quantity" => $product['quantity'],

                    "name" => $product['name'],
                    "category_id" => $product['category_id'],
                    "price" => $product['price'],
                    "image_1" => $product['image_1'],
                ];
            }
            session()->forget('cart.products.'.$productKey);
            session()->push('cart.products', $cartProductUpdate);
            $i++;
        }

        return response($request); // ответ в js
    }

    public function clear() {
        session()->flush('cart');

        return redirect()->back();
    }

    public function checkout() {
        $products = session('cart.products');
        return view('checkout', compact('products'));
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
        $cart_products = session('cart.products');;
        foreach ($cart_products as $cart_product) {
            $order->attach($cart_product['id'], ['count' => $cart_product['quantity']]);
        }

        // чистим сессию
        session()->forget('cart');

        return redirect()->route('index');
    }

    static function getProductsCountInCart() {
        $products = session('cart.products'); // продукты в корзине
        $productsCount = 0;
        foreach ($products as $product) {
            $productsCount = $productsCount + $product['quantity'];
        }
        return $productsCount;
    }

    static function getProductSum($productId) {
        $products = session('cart.products'); // продукты в корзине
        foreach ($products as $product) { // находим запрашиваемый продукт
            if($product['id'] == $productId) {
                return $product['price'] * $product['quantity']; // возвращаем сумму
            }
        }
    }

    static function getTotalSum() {
        $products = session('cart.products');

        if(!empty($products)) {
            $totalSum = 0;
            foreach ($products as $product) {
                $totalSum = $totalSum + $product['price'] * $product['quantity'];
            }
            return $totalSum;
        }
    }
}
