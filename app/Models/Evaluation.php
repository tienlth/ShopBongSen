<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable=[
        'customers_id',
        'product_id',
        'color_evaluation',
        'style_evaluation',
        'dimension_evaluation',
        'content',
        'quality',
    ];

    public function imageofevaluations(){
        return $this->hasMany(Imageofevaluation::class);
    }

    public function customers(){
        return $this->belongsTo(Customer::class);
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }


}
