<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name'
    ];
    public function users(){
        return $this->hasOne(User::class);
    } 
}
