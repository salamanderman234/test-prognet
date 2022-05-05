<?php

namespace App\Http\Controllers\Resource;

use App\Models\ProductImage;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use App\Http\Controllers\Controller;


class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProductImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductImageRequest  $request
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductImageRequest $request, ProductImage $productImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();
        return back()->with('message','Gambar Berhasil Dihapus');
    }

    public function upload(){
        request()->validate([
            'image'=>'required'
        ]);
        if(request()->has('image_id')){
            $image = ProductImage::find(request()->image_id);
            $destination_path = 'images/products';
            $path = request()->file('image')->store($destination_path);
            $image->image_name = $path;
            $image->save();
        }else {
            $destination_path = 'images/products';
            $path = request()->file('image')->store($destination_path);
            ProductImage::create([
                'product_id'=>request()->product_id,
                'image_name'=>$path
            ]);
        }
        return back()->with('message','Gambar Berhasil disimpan');
    }
}
