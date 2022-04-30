<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class ProductCategory extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class,'category_details','category_id','product_id');
    }
}
