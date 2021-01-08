<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Services\CurrencyConversion;
use function GuzzleHttp\options;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CartController extends Controller
{
    public function cart() {
        $products = session('cart.products');
        return view('cart', compact('products'));
    }

    public function check(Request $request) {
        $productId = json_decode($request['productId']);
        $activeValues = explode(',',$request['activeValuesString']);
        $sku = Sku::getSelectedSku($productId, $activeValues); // получаем sku
        $cart = session('cart'); // корзина

        $skuInCart = $this->checkSkuInCart($cart, $sku); // проверка наличия sku в корзине (ответ true или false)
        if($skuInCart == true) { $skuQuantityInCart = $this->checkQuantitySkuInCart($cart, $sku); } else { // узнаем колличество sku в корзине
            $skuQuantityInCart = 0; // если sku нет в корзине, колличество 0
        }

        $skuInCartAndQuantity = [$skuInCart, $skuQuantityInCart, $sku->id];

        return response(json_encode($skuInCartAndQuantity)); // ответ в js
    }

    public function checkSkuInCart($cart, $sku) { // проверка sku продукта в корзине
        $skuInCart = false; // true если добавляемый продукт уже есть в корзине
        /*if(session()->has('cart.products')) {
            foreach ($cart['products'] as $cartProductKey => $cartProduct) {
                if($cartProduct['id'] == $product->id) {$productInCart = true;}
            }
        }*/
        if(session()->has('cart.products')) {
            foreach ($cart['products'] as $cartProductKey => $cartProduct) {
                if($cartProduct['id'] == $sku->id) {$skuInCart = true;}
            }
        }

        return $skuInCart;
    }

    public function checkQuantitySkuInCart($cart, $sku) {
        foreach ($cart['products'] as $cartProductKey => $cartProduct) {
            if($cartProduct['id'] == $sku->id) {
                return $cartProduct['quantity'];
            }
        }
    }

    public function add(Request $request) { // получаем продукт через модель // ajax
        // получаем продукт из БД
        $productId = json_decode($request['id']);
        $productQuantity = json_decode($request['quantity']);
        $selectedAttrValuesArray = explode(',', $request['selectedAttrValues']); // массив с выбранными значениями аттрибутов sku

        $product = Product::where('id', $productId)->first();
        $sku = Sku::getSelectedSku($productId, $selectedAttrValuesArray); // получаем sku

        // сохраняем id пользователя в сессию или записывааем уникальный
        $cart = session('cart');
        if(is_null($cart)) {
            if(Auth::check()) {
                $cart = session(['cart.id' => Auth::user()->id]);
            } else {
                $cart = session(['cart.id' => uniqid()]);
            }
        }

        // проверка sku продукта в корзине
        $skuInCart = $this->checkSkuInCart($cart, $sku);

        if ($skuInCart == true) { // если добавляемый sku уже есть в корзине
            $cartOld = session('cart.products'); // старая корзинв
            $cartNew = []; // формируем новую корзину из сессии в виде массива
            foreach ($cartOld as $cartProductOld) {
                array_push($cartNew, $cartProductOld);
            }

            // обновление продукта в корзине
            foreach ($cartNew as $cartProductKey => $cartProduct) { // поиск в корзине обновляемого продукта
                if($cartProduct['id'] == $sku->id) {
                    $cartProductUpdate = [ // массив нового продукта
                        "id" => $sku->id,
                        "product_id" => $product->id,

                        "name" => $product->__('name'),
                        "category_id" => $product->category_id,
                        "price" => $product->price,
                        'sku_price' => $sku->price,

                        "options" => $selectedAttrValuesArray,
                        "image_1" => $product->image_1,

                        "quantity" => $cartProduct['quantity'] + $productQuantity,
                    ];
                    unset($cartNew[$cartProductKey]); // удаляем массив старого продукта
                }
            }
            array_unshift($cartNew, $cartProductUpdate); // добавляем обновляемый продукт в начало корзины
            session()->put('cart.products', $cartNew); // записываем новую корзину в сессию
        } else { // добавляем новый предмет в корзину
            $cartProduct = [ // формируем массив продукта
                "id" => $sku->id,
                "product_id" => $product->id,

                "name" => $product->__('name'),
                "category_id" => $product->category_id,
                "price" => $product->price,
                'sku_price' => $sku->price,

                "options" => $selectedAttrValuesArray,
                "image_1" => $product->image_1,

                "quantity" => $productQuantity,
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

        return response(json_encode($product->__('name'))); // ответ в js / json_encode($request)
    }

    public function getAttributesNameAndValuesName(Request $request) {
        $productId = json_decode($request['id']); // поучаем id продукта
        $selectedAttrValues = explode(',', $request['selectedAttrValues']);
        $sku = Sku::getSelectedSku($productId, $selectedAttrValues); // получаем sku

        $attributesNames = [];// получаем названия аттрибутов
        foreach ($selectedAttrValues as $selectedAttrValue) {
            array_push($attributesNames, AttributeValue::where('value', $selectedAttrValue)->first()->attribute->__('name'));
        }

        $valuesNames = [];// получаем названия значений
        foreach ($selectedAttrValues as $valueName) {
            array_push($valuesNames, AttributeValue::where('value', $valueName)->first()->__('name'));
        }

        return response(json_encode([$attributesNames, $valuesNames, $sku->id])); // ответ в js / json_encode($request)
    }

    public function remove(Request $request) {
        $skuId = json_decode($request['id']);

        $products = session('cart.products');
        foreach ($products as $productKey => $product) {
            if($product['id'] == $skuId) {
                session()->forget('cart.products.'.$productKey);

                return response(json_encode($product)); // ответ в js
            }
        }
    }

    public function update(Request $request) {
        $productId = json_decode($request['id']); // поучаем id продукта
        $quantity = json_decode($request['quantity']); // получаем количество продукта
        $selectedAttrValuesArray = explode(',', $request['selectedAttrValues']); // массив с выбранными значениями аттрибутов sku

        $products = session('cart.products'); // получаем продукты которые в корзине
        $sku = Sku::getSelectedSku($productId, $selectedAttrValuesArray); // получаем sku

        $i = 0; foreach ($products as $productKey => $product) {
            if($product['id'] == $sku->id) { // если это обновляемый продукт
                $cartProductUpdate = [
                    "id" => $sku->id,
                    "product_id" => $product['product_id'],

                    "name" => $product['name'],
                    "category_id" => $product['category_id'],
                    "price" => $product['price'],
                    'sku_price' => $sku->price,

                    "options" => $selectedAttrValuesArray,
                    "image_1" => $product['image_1'],

                    "quantity" => $quantity,
                ];
            } else { // если это не обновляемый продукт
                $cartProductUpdate = $product;
            }
            session()->forget('cart.products.'.$productKey);
            session()->push('cart.products', $cartProductUpdate);
            $i++;
        }

        return response(json_encode($productId)); // ответ в js
    }

    public function clear() {
        session()->flush('cart');

        return redirect()->back();
    }

    public function checkout() {
        $products = session('cart.products');
        return view('checkout', compact('products'));
    }
    public function getSku($id) {
        return Sku::where('id', $id)->first();
    }

    public function buy(Request $request) {
        $request->validate([
            'first_name' => ['required', 'max:100'],
            'last_name' => ['required', 'max:100'],
            'phone' => ['required'],
            'shipping_city' => ['required'],
            'shipping_street' => ['required'],
            'shipping_apartment' => ['required'],
            'message' => ['max:500'],
        ]);

        /* Создаем заказ ------------------------------------------ */
        $order = new Order();

        $order->status = 1;
        if(Auth::check()): $order->user_id = Auth::user()->id; endif;

        $order->first_name = $request->input('first_name') ? $request->input('first_name') : Auth::user()->first_name;
        $order->last_name = $request->input('last_name') ? $request->input('last_name') : Auth::user()->last_name;
        $order->phone = $request->input('phone') ? $request->input('phone') : Auth::user()->phone;
        $order->email = $request->input('email') ? $request->input('email') : Auth::user()->email;

        $order->currency_id = 1; // настроить
        $order->sum = $this->getTotalSum();

        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_street = $request->input('shipping_street');
        $order->shipping_apartment = $request->input('shipping_apartment');

        $order->message = $request->input('message');

        $order->payment_method = 'cash_payment'; // настроить

        $success = $order->save(); // сохраняем заказ в БД

        /* создаем order_connector -------------------------------------------- */
        $order = Order::find($order->id)->skus();
        $cart_products = session('cart.products');;

        foreach ($cart_products as $cart_product) {
            $options = implode(',', $cart_product['options']);
            $order->attach($cart_product['id'], ['count' => $cart_product['quantity'], 'options' => $options]);
        }
        // чистим сессию
        session()->forget('cart');
        if($success) {
            session()->flash('notification', __('notifications.buy'));
        }

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
                $totalSum = CurrencyConversion::convert($totalSum + $product['price'] * $product['quantity']);
            }
            return $totalSum;
        }
    }
}
