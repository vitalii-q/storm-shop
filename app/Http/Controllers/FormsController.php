<?php

namespace App\Http\Controllers;

use App\Events\EmailSubscription;
use App\Jobs\subscriptionJob;
use App\Models\AdminNotifications;
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
        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,

            'file' => $request->file ? 'storage/messages_files/'.$request->file->getClientOriginalName() : null,
        ]);

        // Создаем уведомление в админ панеле
        AdminNotifications::create([
            'notification_id' => $message->id,
            'type' => 'Сообщение',
            'view' => 0,
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

        session()->flash('notification',  __('notifications.message'));
        return redirect()->route('contacts');
    }

    public function subscription(Request $request) {
        $request->validate([
            'email_footer' => 'required|unique:subscriptions,email',
        ]);

        // queue - подписка через очереди
        //dispatch(new subscriptionJob($request->email_footer))->delay(now()->addSeconds(5));

        // event - подписка через событие
        event(new EmailSubscription($request->email_footer));

        session()->flash('notification', __('notifications.subscription'));
        return redirect()->back();
    }
}
