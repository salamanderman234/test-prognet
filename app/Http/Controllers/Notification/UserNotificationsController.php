<?php

namespace App\Http\Controllers\Notification;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;


class UserNotificationsController extends Controller
{
    public function show(){
        $unreads = auth()->user()->unreadNotifications;
        $notif = auth()->user()->unreadNotifications->markAsRead();
        return view('dashboard.user.notifications',compact('unreads'));
    }

    public function update(){
        auth()->user()->unreadNotifications->markAsRead();
        return true;
    }

    public function admin_notifications(){
        $notifications = Auth::guard('admin')->user()->notifications()->orderBy('created_at','desc')->paginate(5);
        Paginator::useBootstrap();
        return view('dashboard.admin.notifications.index',compact('notifications'));
    }
    public function admin_notification_read(){
        if(request()->notif != null){
            Auth::guard('admin')->user()->notifications()->where('id',request()->notif)->get()->markAsRead();
        }
    }
}
