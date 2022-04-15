<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller{
    public function index(){
        $products = Product::where('id','!=',0)->paginate(10)->withQueryString();
        Paginator::useBootstrap();
        return view('dashboard.admin.tables.product.index',compact('products'));
    }
 
    public function create()
    {
        $credentials = request()->validate([
            'product_name'=>'require|max:50|min:5',
            'price'=>'require',
            'description'=>'require|max:255',
            'stock'=>'require',
            'weight'=>'require'
        ]);

        Product::create([
            'product_name'=>request()->product_name,
            'price'=>request()->price,
            'description'=>request()->description,
            'stock'=>request()->stock,
            'product_rate'=>0.0,
            'weight'=>request()->weight
        ]);
        return redirect()->route('admin.resource.product.index')->with('message','Product Berhasil Dibuat !');
    }

    public function show(Product $product)
    {
        return view('admin.resource.product.detail',compact('product'));
    }

    public function edit(Product $product){
        return view('admin.resource.product.edit',compact('product'));
    }

    public function update(Product $product){
        request()->validate([
            'product_name'=>'require|max:50|min:5',
            'price'=>'require',
            'description'=>'require|max:255',
            'stock'=>'require',
            'weight'=>'require'
        ]);
        $product->product_name = request()->product_name;
        $product->price = request()->price;
        $product->description = request()->description;
        $product->stock = request()->stock;
        $product->weight = request()->weight;
        $product->save();
        return back()->with('message','Product '.$product->product_name.' Berhasil Diedit !');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('admin.resource.product.index')->with('message','Product Berhasil Dihapus !');
    }
}
