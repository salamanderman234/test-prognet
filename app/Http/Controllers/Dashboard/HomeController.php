<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

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
            $another_product->category = $another_product->categories->first(); 
                                                   
        } 
        $new_products = Product::orderBy('id','desc')
            ->take(4)
            ->get();
        
        foreach($new_products as $new_product){
            $new_product->thumbnail = $new_product
                                        ->images()
                                        ->get()
                                        ->first();  
            $new_product->category = $new_product->categories->first();                                        
        }
        return view('welcome',compact('new_products','another_products'));
    }

    public function product_detail(ProductCategory $category,Product $product){
        $product_images = $product->images()->orderBy('id','desc')->get();
        $product_reviews = $product->reviews;
        foreach($product_reviews as $product_review){
            $product_review->responses = $product_review->responses;
            $product_review->user = $product_review->user->name;
        }
        return view('dashboard.user.product_detail',compact('product','product_images','category','product_reviews'));
    }
    
    public function search(){
        $slug = "";
        if(request()->has('category')){
            $products = ProductCategory::where('category_name',request()->category)->get()->first()->products;
            foreach($products as $product){
                $product->thumbnail = $product
                                    ->images()
                                    ->get()
                                    ->first();  
                $product->category = $product->categories->first();                                        
            }
            $slug = request()->category;
        }else {
            $products = Product::where('product_name','LIKE','%'.request()->keyword.'%')->get();
            foreach($products as $product){
                $product->thumbnail = $product
                                    ->images()
                                    ->get()
                                    ->first();  
                $product->category = $product->categories->first();                                        
            }
            $slug = request()->keyword;
        }

        return view('dashboard.user.search',compact('slug','products'));
    }

}
