<?php

namespace App\Models;

use App\Models\ProductImage;
use App\Models\ProductReview;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $guarded = ['id'];
    use HasFactory,SoftDeletes;

    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function categories(){
        return $this->belongsToMany(ProductCategory::class,'category_details','product_id','category_id')->withTrashed();
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }
}
