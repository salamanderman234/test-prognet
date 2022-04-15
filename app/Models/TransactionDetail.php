<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    public function transaksi(){
        return $this->belongsTo(Transaction::class);
    }
}
