<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instock extends Model
{
    use HasFactory;
    protected $fillable=[
        'quantity',
    ];

    public function ingredients(){
        return $this->hasOne(Ingredient::class);
    }
}
