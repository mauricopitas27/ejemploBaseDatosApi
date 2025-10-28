<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Alumno extends Model
{
    public function matricula(): HasOne
   {
    //Clase alumno, llave foranea en la tabla alumno, llave primaria en la tabla matriculas
       return $this->hasOne(Matricula::class);
   }


   public function telefonos():HasMany
   {
       return $this->hasMany(Telefono::class);
   }
   public function materias():BelongsToMany
   {
    //Relacion muchos a muchos entre alumnos y materias
    // clase relacionada, tabla intermedia, llave foranea de la clase actual en la tabla intermedia, llave foranea de la clase relacionada en la tabla intermedia
       return $this->belongsToMany(Clases::class, 'alumno_clases', 'alumno_id', 'materia_id');
   }

    
}
