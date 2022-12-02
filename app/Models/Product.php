<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'sale',
        'price',
        'height',
        'width',
        'color',
        'expiry',
        'meaning',
        'taking_care_guide',
        'designed_by_customer',
        'producttype_id',
        'style_id',
        'designed_by_customer',
    ];

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class, 'ingredientofproducts')->withPivot('quantity');
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'orderdetails')->withPivot('quantity');
    }
    public function productypes(){
        return $this->belongsTo(Producttype::class);
    }
    public function styles(){
        return $this->belongsTo(Style::class);
    }
    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }
}
