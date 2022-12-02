<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];

    public function instocks(){
        return $this->belongsTo(Instock::class);
    }
    public function importcoupons(){
        return $this->belongsToMany(ImportCoupon::class, 'import_details')->withPivot('quantity', 'price');
    }
    public function products(){
        return $this->belongsToMany(Product::class, 'ingredientofproducts')->withPivot('quantity');
    }
}
