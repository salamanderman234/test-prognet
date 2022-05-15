<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Discount extends Model
{
    protected $guarded = ['id'];
    use HasFactory, SoftDeletes;

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
