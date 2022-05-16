<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    public function home(){
        $another_products = Product::orderBy('id','desc')
            ->skip(4)
            ->take(4)
            ->get();
        
        foreach($another_products as $another_product){
            $another_product->thumbnail = $another_product
                                            ->images
                                            ->first();
            $another_product->categories = $another_product->categories;                                     
        } 
        $new_products = Product::orderBy('id','desc')
            ->take(4)
            ->get();
        
        foreach($new_products as $new_product){
            $new_product->thumbnail = $new_product
                                        ->images
                                        ->first();  
            $new_product->categories = $new_product->categories;                                        
        }
        return view('welcome',compact('new_products','another_products'));
    }

    public function catalog(){
        $categories = ProductCategory::orderBy('category_name')->get();
        foreach($categories as $category){
            $category->all_products = $category->products;
            foreach($category->all_products as $product){
                $product->thumbnail = $product->images->first()->image_name;
            }
        }

        return view('dashboard.user.catalog',compact('categories'));
    }
    public function product_detail(ProductCategory $category,Product $product){
        $product_images = $product->images()->orderBy('id','desc')->get();
        $product_reviews = $product->reviews;
        foreach($product_reviews as $product_review){
            $product_review->responses = $product_review->responses;
            $product_review->user = $product_review->user->name;
        }
        $product_discount = $product->discounts()
            ->where('start','<=',Carbon::now())
            ->where('end','>=',Carbon::now())
            ->get()
            ->first();
        return view('dashboard.user.product_detail',compact('product','product_images','category','product_reviews','product_discount'));
    }
    
    public function search(){
        $slug = "";
        if(request()->has('keyword')){
            $category = ProductCategory::where('category_name','LIKE','%'.request()->keyword.'%')->get();
            if(count($category)>0){
                $products = $category[0]->products;
            }else {
                $products = Product::where('product_name','LIKE','%'.request()->keyword.'%')->get();
            }
            foreach($products as $product){
                $product->thumbnail = $product
                                    ->images()
                                    ->get()
                                    ->first();  
                $product->category = $product->categories;                                        
            }
            $slug = request()->keyword;
        }else {
            return back();
        }
        

        return view('dashboard.user.search',compact('slug','products'));
    }

    public function profile(){
        $user = auth()->user();
        return view('dashboard.user.profile',compact('user'));
    }

    public function edit_profile(){
        request()->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $user = auth()->user();
        $user->name = request()->name;
        $user->email = request()->email;
        $user->save();

        return back()->with('message','Berhasil Edit Profile');
    }

    public function transactions(){
        $expired_transactions = auth()->user()->transactions()->where("timeout","<=",Carbon::now())->where('status',"Menunggu verifikasi")->get();
        foreach($expired_transactions as $transaction){
            $transaction->status = "Expired";
            $transaction->save();
        }
        $transactions = auth()->user()->transactions()->orderBy('updated_at','desc')->get();
        foreach($transactions as $transaction){
            $transaction->details_transaction = $transaction->details;
            foreach($transaction->details_transaction as $detail){
                $detail->detail_product = $detail->product;
            }
            $first_product = $transaction
                    ->details_transaction
                    ->first()
                    ->detail_product;

            $first_product->thumbnail = $first_product->images->first()->image_name;
            $first_product->reviewable = true;
            if(count(auth()->user()->reviews()->where('product_id',$first_product->id)->get())>=1){
                $first_product->reviewable = false; 
            }
        }

        return view('dashboard.user.transactions',compact('transactions'));
    }

    public function reviews(){
        $transactions = auth()->user()->transactions()->where('status','Sampai di tujuan')->get();
        $products_not_reviewed = [];
        $reviews = auth()->user()->reviews()->orderBy('created_at','desc')->get();
        foreach($transactions as $transaction){
            $details_transaction = $transaction->details;
            foreach($details_transaction as $detail_transaction){               
                $product = $detail_transaction->product;
                $check = auth()->user()->reviews()->where('product_id',$product->id)->get();
                if(count($check)==0){
                    $product->image_name = $product->images->first()->image_name;
                    array_push($products_not_reviewed,$product);
                }
            }
        }
        foreach($reviews as $review){
            $review->product_detail = $review->product;
            $review->product_detail->image_name = $review->product_detail->images->first()->image_name;
        }

        return view('dashboard.user.reviews',compact('products_not_reviewed','reviews'));
    }

    public function notifications(){
        $notifications = auth()->user()->notifications;
        return view('dashboard.user.notifications',compact('notifications'));
    }

}
