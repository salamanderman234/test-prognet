<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\ProductCategory;

class Product extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function categories(){
        return $this->belongsToMany(ProductCategory::class,'category_details','product_id','category_id');
    }
}
