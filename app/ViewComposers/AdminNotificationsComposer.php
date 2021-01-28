<?php

namespace App\ViewComposers;


use App\Models\AdminNotifications;
use Illuminate\View\View;

class AdminNotificationsComposer
{
    public function compose(View $view) {
        $notifications = AdminNotifications::where('views', '<', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $view->with('AdminNotificationsHF', $notifications); // шарим переменную
    }
}