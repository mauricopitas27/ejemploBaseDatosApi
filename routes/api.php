<?php

use App\Models\Productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/productos', function () {
    return Productos::all();
 })->middleware('auth:sanctum');   

Route::get('/productos/{id}', function (string $id) {
    return Productos::find($id);
});

Route::get('/productos/crear/{descripcion}/{categorias}/{cantidad}/{precio}', 
   function (string $descripcion, string $categorias, int $cantidad, float $precio){
   
     Productos::create([
        'descripcion' => $descripcion,
        'categorias' => $categorias,
        'cantidad' => $cantidad,
        'precio' => $precio
     ]);
    return Productos::all();
});


Route::post('/productos/crear', function(){



     Productos::create([
        'descripcion' =>request()->descripcion,
        'categorias' => request()->categorias,
        'cantidad' => request()->cantidad,
        'precio' => request()->precio
     ]);
    return Productos::all();
    });


Route::put('/productos/actualizar', function(){

    $producto = Productos::findOrFail(request()->id);
    $producto->descripcion = request()->descripcion;
    $producto->categorias = request()->categorias;
    $producto->cantidad = request()->cantidad;
    $producto->precio = request()->precio;
    $producto->save();
    return $producto::all();
});


Route::delete('/productos/eliminar', function(){

    $producto = Productos::findOrFail(request()->id);
    $producto->delete();
    return $producto::all();
});

Route::post('/usuario/registrar', [AuthController::class, 'register']);

Route::post('/usuario/login', [AuthController::class, 'login']);