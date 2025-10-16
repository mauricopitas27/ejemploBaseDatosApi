<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class matricula extends Model
{
   public function alumno(): HasOne
   {
       return $this->hasOne(Alumno::class, 'id', 'alumno_id');
   }
}
