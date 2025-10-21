<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Alumno extends Model
{
    public function matricula(): HasOne
   {
    //Clase alumno, llave foranea en la tabla alumno, llave primaria en la tabla matriculas
       return $this->hasOne(Matricula::class);
   }
    
}
