<?php

use App\Models\CategoryDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Notifications\UserNotification;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Review\ResponseController;
use App\Http\Controllers\Resource\CourierController;
use App\Http\Controllers\Resource\ProductController;
use App\Http\Controllers\Review\ProductReviewController;
use App\Http\Controllers\Resource\ProductImageController;
use App\Http\Controllers\Resource\CategoryDetailController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Resource\ProductCategoryController;
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

//dashboard for user
Auth::routes(['verify'=> true]);
Route::get('/', [HomeController::class,"home"])->name('welcome')->middleware(['back']);
Route::get('/find',[HomeController::class,'search'])->name('search')->middleware(['back']);
Route::get('/find/{category}/{product}',[HomeController::class,"product_detail"])->name('home.product_detail')->middleware(['back']);


Route::prefix('/')->name('user.')->group(function(){
    Route::middleware(['guest','back'])->group(function () {
        Route::view('/login','login_signup.user.login')->name('login');
        Route::view('/signup','login_signup.user.signup')->name('signup');
        Route::post('/autenticate',[LoginController::class,'userLogin'])->name('autenticate');
        Route::post('/signup/save',[LoginController::class,'userRegister'])->name('save_signup');        
    });

    Route::middleware(['auth','back','verified'])->group(function () {
        Route::get('/profile',[UserController::class,'home'])->name('profile');
        Route::get('/notifications',[UserNotificationsController::class,'show'])->name('notifications');
        Route::post('/send_notification/{user}',[UserNotificationsController::class,'sendNotification'])->name('send_notif');
        Route::post('/cart/{product}/add',[CartController::class,'add'])->name('cart.add');
        Route::get('/cart',[CartController::class,'index'])->name('cart.index');
        Route::post('/cart/{cart}/delete',[CartController::class,'destroy'])->name('cart.delete');
        Route::post('/cart/product/harga',[CartController::class,'harga'])->name('cart.product.harga');

        Route::get('/catalog',[HomeController::class,'catalog'])->name('catalog');

        Route::get('/profile',[HomeController::class,'profile'])->name('profile');
        Route::post('/profile/save',[HomeController::class,'edit_profile'])->name('profile.save');

        Route::get('/transactions',[HomeController::class,'transactions'])->name('transactions');
        Route::post('/transaction/{transaction}/cancel',[TransactionController::class,'cancel'])->name('transaction.cancel');

        Route::post('/{product}/review',[ProductReviewController::class,'create'])->name('product.review');
        Route::get('/reviews',[HomeController::class,'reviews'])->name('reviews');

        Route::post('/notifications/read',[UserNotificationsController::class,'update'])->name('notification.read');
        Route::get('/notifications',[UserNotificationsController::class,'show'])->name('notifications');

        Route::post('/purchase',[TransactionController::class,'purchase'])->name('purchase');
        Route::post('/purchase/save',[TransactionController::class,'purchase_save'])->name('purchase.save');

        Route::post('/purchase/{transaction}/upload_proof',[TransactionController::class,'upload_proof'])->name('purchase.upload_proof');
        Route::post('/get_shipping_cost',[TransactionController::class,'get_shipping_cost'])->name('get_shipping_cost');
    });
    Route::post('/logout',[LoginController::class,'userLogout'])->name('logout')->middleware(['auth','back']); 

});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','back'])->group(function () {
        Route::view('/login','login_signup.admin.login')->name('login');
        Route::view('/signup','login_signup.admin.signup')->name('signup');
        Route::post('/autenticate',[LoginController::class,'adminLogin'])->name('autenticate');
        Route::post('/signup/save',[LoginController::class,'adminRegister'])->name('save_signup');        
    });
    Route::middleware(['auth:admin','back'])->group(function () {
        Route::get('/home',[AdminController::class,'index'])->name('home');
        Route::post('/logout',[LoginController::class,'adminLogout'])->name('logout');

        Route::post('/get_chart',[AdminController::class,'get_chart_data'])->name('get_chart');
        Route::post('/get_chart_year',[AdminController::class,'get_chart_data_year'])->name('get_chart_year');

        //prefix untuk table
        Route::prefix('/table')->name('table.')->group(function () {
            Route::resource('product', ProductController::class);
            Route::resource('category', ProductCategoryController::class);
            Route::resource('courier', CourierController::class);
        });

        Route::prefix('/review')->name('review.')->group(function(){
            Route::get('/',[ProductReviewController::class,'index'])->name('index');
            Route::get('/{review}',[ResponseController::class,'reply'])->name('reply');
            Route::post('/{review}/save',[ResponseController::class,'reply_save'])->name('reply.save');
            Route::get('/{review}/edit',[ResponseController::class,'reply_edit'])->name('reply.edit');
            Route::post('/{review}/edit/save',[ResponseController::class,'reply_edit_save'])->name('reply.edit.save');
        });

        Route::prefix('/transaction')->name('transaction.')->group(function(){
            Route::get('/',[TransactionController::class,'index'])->name('index');
            Route::get('/{transaction}/edit',[TransactionController::class,'edit'])->name('edit');
            Route::post('/{transaction}/edit/save',[TransactionController::class,'update'])->name('edit.save');
        });
        
        Route::get('/notifications',[UserNotificationsController::class,'admin_notifications'])->name('notifications');
        Route::post('/notification/read',[UserNotificationsController::class,'admin_notification_read'])->name('notification.read');

        Route::post('/product/image/{productImage}/delete',[ProductImageController::class,'destroy'])->name('product_image.delete');
        Route::post('/product/image/save',[ProductImageController::class,'upload'])->name('product_image.upload');
        Route::post('/product/product_category/save',[CategoryDetailController::class,'change'])->name('product_category.change');
        Route::post('/product/product_category/delete',[CategoryDetailController::class,'remove'])->name('product_category.remove');
        Route::post('/product/product_category/add',[CategoryDetailController::class,'add'])->name('product_category.add');
    });
});

Route::view('/test','dashboard.user.notifications');