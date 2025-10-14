<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
     protected $fillable = [
        'nombre completo',
        'departamento',
        'antiguedad',
        'nomina'
    ];
}
