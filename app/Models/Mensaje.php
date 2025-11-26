<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mensaje extends Model
{
    protected $table = 'mensajes';

    protected $fillable = [
        'nombre_usuario',
        'mensaje',
        'fecha_hora',
    ];
    protected $casts = [
        'fecha_hora' => 'datetime',
    ];
}

