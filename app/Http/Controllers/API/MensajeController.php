<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class MensajeController extends Controller
{
    /**
     * Almacena un nuevo mensaje recibido desde el cliente de chat (vía API POST).
     * El cliente envía 'usuario', 'mensaje' y 'fecha_hora'.
     */
    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $validator = Validator::make($request->all(), [
            // El campo se llama 'usuario' en el payload de Python
            'usuario' => 'required|string|max:255', 
            'mensaje' => 'required|string',
            // Esperamos un formato de fecha ISO, el cual es validado por 'date'
            'fecha_hora' => 'required|date', 
        ]);

        if ($validator->fails()) {
            // Retornar un error 400 (Bad Request) con detalles de la validación
            return response()->json(['errors' => $validator->errors()], 400);
        }

        try {
            // Crear el registro del mensaje
            $mensaje = Mensaje::create([
                'nombre_usuario' => $request->usuario, // Mapea 'usuario' a 'nombre_usuario'
                'mensaje' => $request->mensaje,
                'fecha_hora' => $request->fecha_hora, // Guarda la fecha/hora recibida del cliente
            ]);

            // Retornar una respuesta exitosa 201 (Created)
            return response()->json(['message' => 'Mensaje guardado con éxito', 'data' => $mensaje], 201);

        } catch (\Exception $e) {
            // Manejo de error general (ej. error de base de datos)
             return response()->json(['message' => 'Error al guardar el mensaje', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Obtiene los últimos 50 mensajes.
     */
    public function index()
    {
        // En un chat real, es mejor limitar el número de mensajes devueltos.
        $mensajes = Mensaje::orderBy('fecha_hora', 'desc')
                           ->take(50)
                           ->get();

        return response()->json($mensajes);
    }
}