<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    
    public function home(){
        $another_products = Product::orderBy('id','desc')
            ->skip(4)
            ->take(4)
            ->get();
        
        foreach($another_products as $another_product){
            $another_product->thumbnail = $another_product
                                            ->images()
                                            ->get()
                                            ->first();                                          
        }
        $new_products = Product::orderBy('id','desc')
            ->take(4)
            ->get();
        
        foreach($new_products as $new_product){
            $new_product->thumbnail = $new_product
                                        ->images()
                                        ->get()
                                        ->first();                                          
        }
        return view('welcome',compact('new_products','another_products'));
    }

    public function product_detail(Product $product){
        $product_images = $product->images()->orderBy('id','desc')->get();
        return view('dashboard.user.product_detail',compact('product','product_images'));
    }

}
