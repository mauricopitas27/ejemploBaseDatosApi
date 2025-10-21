<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $fillable = [
        'nombre cliente',
        'domicilio',
        'email',
        'descuento especial',
        'telefono'
    ];
}
