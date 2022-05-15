<?php

namespace App\Http\Controllers\Resource;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use App\Models\CategoryDetail;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller{
    public function index(){
        $products = Product::where('id','!=',0)->paginate(5)->withQueryString();
        Paginator::useBootstrap();
        return view('dashboard.admin.tables.product.index',compact('products'));
    }
    
    public function create(){
        $categories = ProductCategory::all();
        return view('dashboard.admin.tables.product.create',compact('categories'));
    }
    public function store(StoreProductRequest $request)
    {
        $credentials = $request->validated();
        $credentials['slug'] = Str::slug($request->product_name);
        $credentials['product_rate'] = 0.0;
        $product = Product::create($credentials);
        CategoryDetail::create([
            'product_id'=>$product->id,
            'category_id'=>$request->product_category
        ]);
        $path = "";
        if(request()->hasFile('product_image')){
            request()->validate([
                'product_image'=>'image'
            ]);
            $destination_path = 'images/products';
            $path = $request->file('product_image')->store($destination_path);
            ProductImage::create([
                'product_id'=>$product->id,
                'image_name'=>$path
            ]);
        }
        return redirect()->route('admin.table.product.index')->with('message','Product Berhasil Dibuat !');
    }

    public function show(Product $product)
    {
        $product_images = $product->images;
        $product_categories = $product->categories;
        return view('dashboard.admin.tables.product.detail',compact('product_categories','product','product_images'));
    }

    public function edit(Product $product){
        $product_images = $product->images;
        $product_categories = $product->categories;
        $categories = ProductCategory::all();
        return view('dashboard.admin.tables.product.edit',compact('product','product_images','product_categories','categories'));
    }

    public function update(Product $product,UpdateProductRequest $request){
           
        $request->validated();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $product->slug = Str::slug($request->product_name);

        if($request->has('thumbnail')){
            $request->validate([
                'thumbnail'=>'image'
            ]);
            $destination_path = 'images/products';
            $path = $request->file('thumbnail')->store($destination_path);
            $product_thumbnail = $product->images->first();
            $product_thumbnail->image_name = $path;
            $product_thumbnail->save();
        }

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
