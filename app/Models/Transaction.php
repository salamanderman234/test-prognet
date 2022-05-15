<?php

namespace App\Models;

use App\Models\User;
use App\Models\Courier;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    protected $guarded = ['id'];
    use HasFactory, SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function courier(){
        return $this->belongsTo(Courier::class);
    }

    public function details(){
        return $this->hasMany(TransactionDetail::class);
    }
}
