<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminNotifications extends Model
{
    protected $fillable = ['notification_id', 'type', 'views'];

    public function comment() {
        return $this->belongsTo(BlogComment::class, 'notification_id');
    }

    public function subscription() {
        return $this->belongsTo(Subscription::class, 'notification_id');
    }

    public function message() {
        return $this->belongsTo(Message::class, 'notification_id');
    }

    public function order() {
        return $this->belongsTo(Order::class, 'notification_id');
    }
}
