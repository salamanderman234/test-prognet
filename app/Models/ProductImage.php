<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    protected $guarded = ['id'];
    use HasFactory, SoftDeletes;
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
