<?php

namespace App\Http\Controllers\Desarrollo\Requerimientos;

use Illuminate\Http\Request;

class requerimientosController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $requerimientos = Requerimiento::all();
        $nameRoute = \Route::currentRouteName();
        return view('Desarrollo.Requerimientos.lista_requerimientos', compact('nameRoute'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nameRoute = \Route::currentRouteName();
        return view('Desarrollo.Requerimientos.crear_requerimientos', compact('nameRoute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
