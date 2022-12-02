<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{
    use HasFactory;
    protected $fillable = ['quantity', 'price'];

    public function ingredients(){
        return $this->hasOne(Instock::class);
    }
    public function importcoupons(){
        return $this->hasOne(ImportCoupon::class);
    }
}
