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
        $notifications = Auth::user()->notifications;
        return view('notifications/user',compact('notifications'));
    }
    public function sendNotification(User $user){
        $user->notify(new UserNotification('Test test','Danger'));
        return back();
    }

    public function update(){
        auth()->user()->unreadNotifications()->markAsRead();
        return true;
    }
}
