<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pruebas = DB::table('Pruebas')->get();
        return view('prueba.index', ['pruebas' => $pruebas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //retorne la vista, llama al store, almacena 
        return view('prueba.create2');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
        ]);
        Prueba::create($request->all());
        return redirect()->route('pruebas.index')->with('success', 'Prueba created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prueba $prueba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prueba $prueba)
    {
        $prueba = Prueba::find($prueba->id);
        return view('prueba.edit', compact('prueba'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prueba $prueba)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        $prueba = Prueba::find($prueba->id);
        $prueba->update($request->all());

        return redirect()->route('pruebas.index')->with('success', 'Prueba actualizada exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prueba $prueba)
    {
        $prueba = Prueba::find($prueba->id);
        $prueba->delete();
        return redirect()->route('pruebas.index')->with('success', 'Prueba eliminada exitosamente');
    }
}
