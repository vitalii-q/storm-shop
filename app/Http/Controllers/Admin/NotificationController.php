<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogComment;
use App\Models\Message;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminNotifications;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = AdminNotifications::orderBy('created_at', 'desc')->paginate(50);
        return view('admin.admin_notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = AdminNotifications::where('id', $id)->first();
        if($notification->views < 1) { // если новое уведомление
            $notification->increment('views'); // делаем как просмотренное
        }

        return view('admin.admin_notifications.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = AdminNotifications::where('id', $id)->first();
        if($notification->type == 'Комментарий') {
            $comment = BlogComment::where('id', $notification->notification_id)->first();
            $comment->delete();
        } elseif ($notification->type == 'Подписка') {
            $subscription = Subscription::where('id', $notification->notification_id)->first();
            $subscription->delete();
        } elseif ($notification->type == 'Сообщение') {
            $message = Message::where('id', $notification->notification_id)->first();

            // удаляем изображение если есть
            if(isset($message->file)) {
                $imagePathExp = explode('/', $message->file);
                $file = end($imagePathExp); // получаем название изображения
                Storage::disk('public')->delete('messages_files/'.$file);
            }

            $message->delete();
        }

        $notification->delete();
        return redirect()->route('admin.notifications.index');
    }
}
