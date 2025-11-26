<?php

use Illuminate\Support\Facades\Route;
use App\Models\Productos;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\ClasesController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    return view('pruebas');
});

Route::get('/productos',[ProductosController::class, 'index'])
      ->name('productos.index');

Route::get('/productos/crear',[ProductosController::class, 'create'])
      ->name('productos.create');      

Route::get('/productos/detalles/{id}',[ProductosController::class, 'show'])
      ->name('productos.show');

Route::post('/productos/guardar',[ProductosController::class, 'store'])
      ->name('productos.store');



Route::get('/productos/editar/{id}',[ProductosController::class, 'edit'])
      ->name('productos.edit');

      Route::put('/productos/actualizar/{id}',[ProductosController::class, 'update'])
        ->name('productos.update');

Route::delete('/productos/eliminar', 
      [ProductosController::class, 'destroy'])
        ->name('productos.destroy');      
        
Route::get('/productos/{id}', function (string $id) {
    return productos::find($id);
});

Route::get('/productos/nombre/{descripcion}', function (string $descripcion) {
    return productos::where("descripcion","like","%".$descripcion."%")->get();
});

Route::get('/matriculas',[MatriculaController::class, 'index'])
      ->name('matriculas.index');

 Route::get('/alumnos',[AlumnoController::class, 'index'])
      ->name('alumnos.index');


       Route::get('/alumnos/telefonos',[AlumnoController::class, 'indexTelefonos'])
      ->name('alumnos.indexTelefonos');




Route::get('/telefonos',[TelefonoController::class, 'index'])
      ->name('telefono.index');

Route::get('/alumnos/materias',[AlumnoController::class, 'indexMaterias'])
      ->name('alumnos.indexMaterias');

Route::get('/materias',[MatriculaController::class, 'indexMaterias'])
      ->name('materias.index');

 Route::get('/vuebasico', function () {
    return view('vuebasico');
});
      Route::get('/vuelista', function () {
      return view('vuelistado');
      });
Route::get('/pagina', function () {
      return view('landingpage.index');
      });


    
