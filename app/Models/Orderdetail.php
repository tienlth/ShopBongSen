<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $fillable = ['quantity'];

    public function orders(){
        return $this->hasOne(Order::class);
    }
    public function products(){
        return $this->hasOne(Product::class);
    }
}
