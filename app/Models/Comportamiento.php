<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comportamiento extends Model
{
    //define los campos o insertar en la base de datos
    protected $fillable = [
        'ip_usuario',
        'tipo_movimiento',
        'origen',
        'elementos_involucrados',
        'fecha_hora',
        'comentarios'
    ];

    public $timestamps = false;
}

