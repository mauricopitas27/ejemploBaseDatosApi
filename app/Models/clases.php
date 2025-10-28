<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class clases extends Model
{
    protected $table = 'clases';

    protected $fillable = [
         'id',
        'nombre',
        'carrera',
        'creditos',
        'inscritos',
    ];

    public function alumno()
    {
        return $this->belongsToMany(Alumno::class, 'matriculas', 'clase_id', 'alumno_id');
    }
}
