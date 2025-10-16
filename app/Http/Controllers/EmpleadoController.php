<?php

namespace App\Http\Controllers;

use App\Models\empleado;
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
        return view ('empleado.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        empleado::create([
            'nombre_completo' => $request->nombre_completo,
            'departamento' => $request->departamento,
            'antiguedad' => $request->antiguedad,
            'nomina' => $request->nomina
        ]);
        return empleado::all();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        return $empleado;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empleado $empleado)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, empleado $empleado)
    {
        $empleado->nombre_completo = $request->nombre_completo;
        $empleado->departamento = $request->departamento;
        $empleado->antiguedad = $request->antiguedad;
        $empleado->nomina = $request->nomina;
        $empleado->save();
        return empleado::all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empleado $empleado)
    {
         $empleado->delete();
            return empleado::all();
    
    }
}
