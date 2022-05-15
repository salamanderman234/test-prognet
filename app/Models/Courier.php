<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courier extends Model
{
    protected $guarded = ['id'];
    use HasFactory, SoftDeletes;

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
