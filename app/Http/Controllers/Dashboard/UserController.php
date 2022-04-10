<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function send_notif(){
        $user = User::all();
        Notification::send($user,new UserNotification('First Notif !','Alert'));
        return 'asiap';
    }
    public function home(){
        $notifications = Auth::user()->notifications;
        return view('dashboard.user.home',compact('notifications'));
    }
}
