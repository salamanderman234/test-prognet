<?php

namespace App\Http\Controllers\Resource;

use App\Models\ProductImage;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use App\Http\Controllers\Controller;


class ProductImageController extends Controller
{
    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();
        return back()->with('message','Gambar Berhasil Dihapus');
    }

    public function upload(){
        request()->validate([
            'image'=>'required|image'
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
