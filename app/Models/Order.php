<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'deliverytime',
        'message',
        'receiver_name',
        'receiver_phone',
        'receiver_address',
        'note',
        'customer_id',
        'status_id',
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'orderdetails')->withPivot('quantity');
    }

    public function customers(){
        return $this->belongsTo(Customer::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
