<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Discount;
use App\Models\ProductImage;
use App\Models\ProductReview;
use App\Models\ProductCategory;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function discounts(){
        return $this->hasMany(Discount::class);
    }

    public function detailTransactions(){
        return $this->hasMany(TransactionDetail::class);
    }
}
