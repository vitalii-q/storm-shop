<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    public function index() {
        return view('personal');
    }

    public function edit() {
        return view('personal_edit');
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

        return redirect()->route('personal');
    }
}
