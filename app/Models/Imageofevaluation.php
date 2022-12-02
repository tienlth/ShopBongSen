<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageofevaluation extends Model
{
    use HasFactory;

    public function evaluations(){
        return $this->belongsTo(Evaluation::class);
    }
}
