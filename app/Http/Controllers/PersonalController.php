<?php

namespace App\Http\Controllers;

use App\Models\Desire;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    public function index($id) {
        $user = User::where('id', $id)->first();
        $orders = Order::where('user_id', Auth::user()->id)->get();

        // получаем продукты которые в желаниях пользователя и сортируем
        $desiresIds = Desire::where('user_id', Auth::user()->id)->select('product_id')->get();
        $desires = Product::whereIn('id', $desiresIds)->orderBy('id', 'desc')->get(); // работает сорт по id

        $personalView = session('view.personal');

        return view('personal.personal', compact('personalView','user', 'orders', 'desires'));
    }
    public function view(Request $request) {
        $viewPersonal = session()->put('view.personal', $request['view']);
        return response(json_encode($viewPersonal));
    }

    public function order($user_id, $order_id) {
        $order = Order::find($order_id);
        $skus = $order->skus()->get();
        //dd($skus);

        if(is_null($order)) {
            return redirect()->route('personal', Auth::user()->id);
        } elseif($order->user_id == Auth::user()->id) {
            return view('personal.order', compact('order', 'skus'));
        } else {
            return redirect()->back();
        }
    }

    public function edit() {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('personal.personal_edit', compact('orders'));
    }

    public function update(Request $request) {
        $user = User::where('id', Auth::user()->id)->first();

        // удаляем старое изображение (если убрали или загрузили новое)
        if($request->delete_image === 'yes' or isset($request->image)) {
            $imagePathExp = explode('/', $user->image);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('users/'.$image);

            $user->update([ // удаляем путь к файлу в бд или записываем новый путь к изображению
                'image' => $request->image ? 'storage/users/'.$request->image->getClientOriginalName() : null,
            ]);
        }

        // кладем файл в файловую систему
        if(isset($request->image)) {
            Storage::disk('public')->put('users/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        $user->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,

            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'street' => $request->street,
            'apartment' => $request->apartment,
        ]);

        return redirect()->route('personal', Auth::user()->id);
    }
}
