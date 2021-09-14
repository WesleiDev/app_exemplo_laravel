<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Utils;

class Bolo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'peso',
        'valor',
        'quantidade'
    ];

    protected $casts = [
        'quantidade' => 'float',
        'valor' => 'float'
    ];

    function setValorAttribute($value){
        $this->attributes['valor'] = Utils::formatReal($value);
    }

    function setPesoAttribute($value){
        $this->attributes['peso'] = Utils::formatReal($value);
    }
}
