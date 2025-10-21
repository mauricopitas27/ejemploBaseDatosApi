<?php

use App\Models\Productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Models\Empleado;


Route::get('/empleados', function () {
    return empleado::all();
})->middleware('auth:sanctum');

Route::get('/empleados/{id}', function (string $id) {
    return empleado::find($id);
});

Route::post('/empleados/crear', function () {
    empleado::create([
        'nombre_completo' => request()->nombre_completo,
        'departamento' => request()->departamento,
        'antiguedad' => request()->antiguedad,
        'nomina' => request()->nomina
    ]);
    return empleado::all();
});

Route::put('/empleados/actualizar', function () {
    $empleado = empleado::findOrFail(request()->id);
    $empleado->nombre_completo = request()->nombre_completo;
    $empleado->departamento = request()->departamento;
    $empleado->antiguedad = request()->antiguedad;
    $empleado->nomina = request()->nomina;
    $empleado->save();
    return empleado::all();
});

Route::delete('/empleados/eliminar', function () {
    $empleado = empleado::findOrFail(request()->id);
    $empleado->delete();
    return empleado::all();
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Api empleados
Route::get("/empleados", [EmpleadoController::class, 'index']);
Route::post("/empleados", [EmpleadoController::class, 'store'])->middleware('auth:sanctum');
Route::get("/empleados/mostrar/{empleado}", [EmpleadoController::class, 'show']);
Route::put("/empleados/actualizar/{empleado}", [EmpleadoController::class, 'update'])->middleware('auth:sanctum');
Route::delete("/empleados/eliminar/{empleado}", [EmpleadoController::class, 'destroy'])->middleware('auth:sanctum');






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

//api empleados
Route::get("/empleados", [EmpleadoController::class, 'index']);
Route::post("/empleados", [EmpleadoController::class, 'store'])->middleware('auth:sanctum');
Route::get("/empleados/mostrar/{empleado}", [EmpleadoController::class, 'show']);
Route::put("/empleados/actualizar/{empleado}", [EmpleadoController::class, 'update'])->middleware('auth:sanctum');
Route::delete("/empleados/eliminar/{empleado}", [EmpleadoController::class, 'destroy'])->middleware('auth:sanctum');

//api cliente
Route::get("/clientes", [ClienteController::class, 'index']);
Route::post('/clientes/crear', [ClienteController::class, 'store']);
Route::get("/clientes/mostrar/{cliente}", [ClienteController::class, 'show']);
Route::put("/clientes/actualizar/{cliente}", [ClienteController::class, 'update']);
Route::delete("/clientes/eliminar/{cliente}", [ClienteController::class, 'destroy']);