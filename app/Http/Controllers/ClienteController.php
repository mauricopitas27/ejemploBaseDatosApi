<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return cliente::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        cliente::create([
    
            'nombre cliente' => $request->input('nombre_cliente'),
            'domicilio' => $request->input('domicilio'),
            'email' => $request->input('email'),
            'descuento especial' => $request->input('descuento_especial'),
            'telefono' => $request->input('telefono')
        ]);
        return cliente::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(cliente $cliente)
    {
        return $cliente;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cliente $cliente)
    {
        $cliente['nombre cliente'] = $request->input('nombre_cliente');
        $cliente['domicilio'] = $request->input('domicilio');
        $cliente['email'] = $request->input('email');
        $cliente['descuento especial'] = $request->input('descuento_especial');
        $cliente['telefono'] = $request->input('telefono');
        $cliente->save();
        return cliente::all();;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cliente $cliente)
    {
        $cliente->delete();
        return cliente::all();
    }
}
