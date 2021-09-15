<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interessado extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'bolo_id'];

    function bolo(){
        return $this->belongsTo(Bolo::class);
    }

}
