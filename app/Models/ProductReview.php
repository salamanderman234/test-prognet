<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductReview extends Model
{
    protected $guarded = ['id'];
    use HasFactory, SoftDeletes;

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function responses(){
        return $this->hasMany(Response::class,'review_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
