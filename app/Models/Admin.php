<?php

namespace App\Models;

use App\Models\Response;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends User
{
    protected $guarded = ['id'];
    use HasFactory,Notifiable,softDeletes;

    public function responses(){
        return $this->hasMany(Response::class);
    }
}
