<?php

namespace App\Http\Controllers\Notification;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;


class UserNotificationsController extends Controller
{
    public function show(){
        return view('dashboard.user.notifications');
    }

    public function update(){
        auth()->user()->unreadNotifications->markAsRead();
        return true;
    }
}
