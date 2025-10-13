<?php

use Illuminate\Support\Facades\Route;
use App\Models\Productos;
use App\Http\Controllers\ProductosController;

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

Route::get('/productos/eliminar/{id}',[ProductosController::class, 'sdestroy'])
      ->name('productos.destroy');

Route::get('/productos/{id}', function (string $id) {
    return productos::find($id);
});

Route::get('/productos/nombre/{descripcion}', function (string $descripcion) {
    return productos::where("descripcion","like","%".$descripcion."%")->get();
});