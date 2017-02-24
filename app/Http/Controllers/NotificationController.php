<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public  function CheckReadAllNotifications(){
        $user = User::find(Auth::id());
        $re = $user->unreadNotifications->markAsRead();
        return $re;
    }
}
