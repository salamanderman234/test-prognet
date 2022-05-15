<?php

namespace App\Http\Controllers\Cart;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    public function add(Product $product){
        $carts = Cart::where('user_id',auth()->user()->id)->where('status','Belum Checkout');
        if(count($carts->get())<10){
            $cart = $carts->where('product_id',$product->id)->get();
            if(count($cart)>0){
                $cart->first()->qty += request()->qty;
                $cart->first()->save();
            }else {
                Cart::create([
                    'user_id'=>Auth::user()->id,
                    'product_id'=>$product->id,
                    'qty'=>request()->qty,
                ]);
            }
        }else {
            return back()->with('message','Keranjang Penuh');
        }
        
        return back()->with('message','Berhasil menambah ke keranjang !');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = auth()->user()->carts()->where('status','Belum Checkout')->get();
        foreach($carts as $cart){
            $cart->product_info = $cart->product;
            $cart->product_info->image = $cart->product_info->images->first();
            
            $discount = $cart->product_info->discounts()
                ->where('start','<=',Carbon::now())
                ->where('end','>=',Carbon::now())
                ->get();
            if(count($discount)>0){
                $discount_price = $discount->first()->percentage*$cart->product_info->price/100;
                $cart->product_info->final_price = $cart->product_info->price - $discount_price;
            }
        }

        return view('dashboard.user.cart',compact('carts'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('message','Item berhasil dihapus dari keranjang');
    }

    public function harga(){
        $cart = Cart::find(request()->item);
        $discount = $cart->product->discounts()
            ->where('start','<=',Carbon::now())
            ->where('end','>=',Carbon::now())
            ->get();
        if(count($discount)>0){
            $price = $cart->product->price * $cart->qty;
            $discount_price = $discount->first()->percentage*$cart->product->price/100;
            $final_price = ($cart->product->price - $discount_price)*$cart->qty;
        }else {
            $price = $cart->product->price * $cart->qty;
            $discount_price = 0;
            $final_price = $cart->product->price * $cart->qty;
        }

        return json_encode(['price'=>$price,'discount_price'=>$discount_price * $cart->qty,'final_price'=>$final_price]);
    }

    public function test(){
        return redirect()->route('welcome')->with('data',request()->item);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }


}
