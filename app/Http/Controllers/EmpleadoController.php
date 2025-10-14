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
         $empleado = empleado::all();
        return view('empleado.index', compact('empleado'));
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
        
        empleado::create($request->all());
        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empleado $empleado)
    {
        $empleado = empleado::find($id);
        return view ('empleado.editar', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empleado $empleado)
    {
        //
    }
}
