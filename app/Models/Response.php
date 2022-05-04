<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\ProductReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Response extends Model
{
    protected $guarded = ['id'];
    use HasFactory, SoftDeletes;

    public function  review(){
        return $this->belongsTo(ProductReview::class,'review_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
