<?php

namespace App\Http\Controllers;

use App\Models\Comportamiento;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ComportamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $comportamiento = new comportamiento();
        $comportamiento->ip_usuario = $request->input('ip_usuario');
        $comportamiento->tipo_movimiento = $request->input('tipo_movimiento'); //1 = ingreso, 2 = click, 3= consulta, 4 = descarga, etc.
        $comportamiento->origen = $request->input('origen');
        $comportamiento->elementos_involucrados = $request->input('elementos_involucrados');
        $carbonDate = Carbon::parse($request->input('fecha_hora'));
        $mysqlFormattedDate = $carbonDate->format('Y-m-d H:i:s');
        $comportamiento->fecha_hora = $mysqlFormattedDate;
        $comportamiento->comentarios = $request->input('comentarios');
        $comportamiento->save();

        return response()->json(['message' => 'Comportamiento registrado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comportamiento $comportamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comportamiento $comportamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comportamiento $comportamiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comportamiento $comportamiento)
    {
        //
    }
}
