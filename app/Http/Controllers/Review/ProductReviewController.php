<?php

namespace App\Http\Controllers\Review;

use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductReview;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Notifications\AdminNotification;
use App\Http\Requests\StoreProductReviewRequest;
use App\Http\Requests\UpdateProductReviewRequest;


class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = ProductReview::orderBy('created_at','desc')->paginate(5)->withQueryString();
        Paginator::useBootstrap();
        foreach($reviews as $review){
            $review->product_name = $review->product->product_name;
        }
        return view('dashboard.admin.reviews.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product, StoreProductReviewRequest $request)
    {
        $request->validated();
        $old_rate = $product->reviews->sum('rate');
        $review = ProductReview::create([
            'product_id'=>$product->id,
            'user_id'=>auth()->user()->id,
            'rate'=>$request->rate,
            'content'=>$request->content ? $request->content:''
        ]);

        $product->product_rate = ($old_rate + $request->rate)/($product->reviews->count()+1);
        $product->save();
        $admins = Admin::all();
        foreach($admins as $admin){
            $admin->notify(new AdminNotification(
                'Review baru pada produk '.$product->product_name,
                'review',
                route("home.product_detail",['category'=>$product->categories->first(),'product'=>$product])
            ));
        }
        return back()->with('message','Review berhasil diposting');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $productReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $productReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductReviewRequest  $request
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductReviewRequest $request, ProductReview $productReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReview $productReview)
    {
        //
    }
}
