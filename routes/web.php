<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Notification\UserNotificationsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify'=> true]);
Route::get('/', function () {
    return view('welcome');
})->middleware(['guest','back']);

Route::prefix('/')->name('user.')->group(function(){
    Route::middleware(['guest','back'])->group(function () {
        Route::view('/login','login_signup.user.login')->name('login');
        Route::view('/signup','login_signup.user.signup')->name('signup');
        Route::post('/autenticate',[LoginController::class,'userLogin'])->name('autenticate');
        Route::post('/signup/save',[LoginController::class,'userRegister'])->name('save_signup');        
    });
    Route::middleware(['auth','back','verified'])->group(function () {
        Route::get('/home',[UserController::class,'home'])->name('home');
        Route::get('/notifications',[UserNotificationsController::class,'show'])->name('notifications');
        Route::post('/send_notification/{user}',[UserNotificationsController::class,'sendNotification'])->name('send_notif');
    });
    Route::post('/logout',[LoginController::class,'userLogout'])->name('logout')->middleware(['auth','back']); 

});

Route::prefix('/admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','back'])->group(function () {
        Route::view('/login','login_signup.admin.login')->name('login');
        Route::view('/signup','login_signup.admin.signup')->name('signup');
        Route::post('/autenticate',[LoginController::class,'adminLogin'])->name('autenticate');
        Route::post('/signup/save',[LoginController::class,'adminRegister'])->name('save_signup');        
    });
    Route::middleware(['auth:admin','back'])->group(function () {
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout',[LoginController::class,'adminLogout'])->name('logout'); 
    });
});

Route::get('/test',function(){
    return view('dashboard.user.layout');
});

