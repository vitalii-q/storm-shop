<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 05.12.2020
 * Time: 23:08
 */

namespace App\ViewComposers;


use App\Models\Desire;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DesiresComposer
{
    public function compose(View $view) {
        if(Auth::check()) {
            $desires = Desire::where('user_id', Auth::user()->id)->get(); // все желания юзера
            $view->with('desiresHF', $desires); // шарим переменную
        }
    }
}