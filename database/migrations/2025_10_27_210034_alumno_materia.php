<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Tabla intermedia para la relacion muchos a muchos entre alumnos y materias
         Schema::create('alumno_clases', function (Blueprint $table) {
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('materia_id');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
