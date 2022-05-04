<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    protected $guarded = ['id'];
    use HasFactory, SoftDeletes;
    public function transaksi(){
        return $this->belongsTo(Transaction::class);
    }
}
