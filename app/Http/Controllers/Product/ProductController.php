<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller{
    public function index(){
        $products = Product::where('id','!=',0)->paginate(5)->withQueryString();
        Paginator::useBootstrap();
        return view('dashboard.admin.tables.product.index',compact('products'));
    }
 
    public function store()
    {
        $credentials = request()->validate([
            'product_name'=>'required|max:50|min:5',
            'price'=>'required|numeric',
            'description'=>'required|max:255',
            'stock'=>'required|numeric',
            'weight'=>'required|numeric'
        ]);

        Product::create([
            'product_name'=>request()->product_name,
            'price'=>request()->price,
            'description'=>request()->description,
            'stock'=>request()->stock,
            'product_rate'=>0.0,
            'weight'=>request()->weight
        ]);
        return redirect()->route('admin.table.product.index')->with('message','Product Berhasil Dibuat !');
    }

    public function show(Product $product)
    {
        return view('dashboard.admin.tables.product.detail',compact('product'));
    }

    public function edit(Product $product){
        return view('dashboard.admin.tables.product.edit',compact('product'));
    }

    public function update(Product $product){
        request()->validate([
            'product_name'=>'required|max:50|min:5',
            'price'=>'required|numeric',
            'description'=>'required|max:255',
            'stock'=>'required|numeric',
            'weight'=>'required|numeric'
        ]);
        $product->product_name = request()->product_name;
        $product->price = request()->price;
        $product->description = request()->description;
        $product->stock = request()->stock;
        $product->weight = request()->weight;
        $product->save();

        return redirect()
            ->route('admin.table.product.index')
            ->with('message','Product '.$product->product_name.' Berhasil Diedit !');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('admin.table.product.index')->with('message','Product Berhasil Dihapus !');
    }
}
