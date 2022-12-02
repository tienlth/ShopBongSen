<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportCoupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'time',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class, 'import_details')->withPivot('quantity', 'price');
    }
}
