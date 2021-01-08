<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class FormsController extends Controller
{
    public function contactMessage(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // кладем файл в файловую систему
        if(isset($request['file'])) {
            Storage::disk('public')->put('messages_files/'.$request->file->getClientOriginalName(), file_get_contents($request->file));
        }
        // создает новую запись в таблице Message
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,

            'file' => $request->file ? 'storage/messages_files/'.$request->file->getClientOriginalName() : null,
        ]);

        // создаем переменную со значениями для передаи в шаблон письма
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,

            'file_name' => $request->file ? $request->file->getClientOriginalName() : null,
            'file' => $request->file ? request()->root().'/storage/messages_files/'.$request->file->getClientOriginalName() : null,
        ];
        Mail::send('emails.contact_message', ['data' => $data], function($message) // шаблон письма, массив данных, функция с информацией об отправке
        {
            $message->from('storm@shop.com', 'Laravel');
            $message->to('foo@example.com')->cc('bar@example.com');
        });

        session()->flash('notification', 'Мы получили ваше сообщение. Благодарим за вашу связь с нами.');
        return redirect()->route('contacts');
    }

    public function subscription(Request $request) {
        $request->validate([
            'email_footer' => 'required',
        ]);

        Subscription::create([ // создает новую запись в таблице Message
            'user_id' => Auth::check() ? Auth::user()->id : null,
            'email' => $request->email_footer,
            'status' => 1,
        ]);

        session()->flash('notification', 'Вы подписались на нашу рассылку');
        return redirect()->back();
    }
}
