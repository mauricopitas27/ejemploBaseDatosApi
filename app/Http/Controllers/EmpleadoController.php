<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Empleado::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Empleado::create([
            'nombre_completo' => $request->input('nombre_completo'),
            'departamento' => $request->input('departamento'),
            'antiguedad' => $request->input('antiguedad'),
            'nomina' => $request->input('nomina')
        ]);
        return Empleado::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        return $empleado;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleado->nombre_completo = $request->input('nombre_completo');
        $empleado->departamento = $request->input('departamento');
        $empleado->antiguedad = $request->input('antiguedad');
        $empleado->nomina = $request->input('nomina');
        $empleado->save();
        return Empleado::all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return Empleado::all();
    }
}
