<?php

namespace App\Http\Controllers\desarrollo\Herramientas\Servicios;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class serviciosController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Herramientas.Servicios.servicios',compact('nameRoute'));

    }

    /**
     * Get all servicios data.
     */

    public function apiServicios()
    {
        $servicios = Servicio::all();
        return response()->json(['data' => $servicios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Herramientas.Servicios.crear_servicio',compact('nameRoute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [

            'sr-nombre.string' =>  'El nombre del servicio debe ser texto.',
            'sr-nombre.max' =>  'El nombre del servicio no debe superar los 150 caracteres.',

            'sr-descripcion.string' => 'La descripción debe ser texto.',
            'sr-descripcion.max' =>  'La descripción del servicio no debe superar los 200 caracteres.',

        ];

        $validate = $request->validate([

            'sr-nombre' => 'required|string|max:150',
            'sr-descripcion' => 'nullable|string|max:200'

        ], $messages);

        Servicio::create([
            'nombre' => $validate['sr-nombre'],
            'descripcion' => $validate['sr-descripcion'],
        ]);

        return redirect()->route('Servicios')->with([
            'successServicio' => 'Servicio creado correctamente.',
            'modelShow' => true
        ]);

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
        $servicio = Servicio::findOrFail($id);
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Herramientas.Servicios.editar_servicio',compact('nameRoute','servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $messages = [

            'sr-nombre.string' =>  'El nombre del servicio debe ser texto.',
            'sr-nombre.max' =>  'El nombre del servicio no debe superar los 150 caracteres.',

            'sr-descripcion.string' => 'La descripción debe ser texto.',
            'sr-descripcion.max' =>  'La descripción del servicio no debe superar los 200 caracteres.',

        ];

        $validate = $request->validate([

            'sr-nombre' => 'required|string|max:150',
            'sr-descripcion' => 'nullable|string|max:200'

        ], $messages);

        $servicio = Servicio::findOrFail($id);

        $servicio->nombre = $validate['sr-nombre'];
        $servicio->descripcion = $validate['sr-descripcion'] ?? null;

        if(!$servicio->isDirty())
        {
            return redirect()->route('Editar Servicio', $servicio->id)->with([
                'warningServicio' => 'No se detecto ningun cambio para el servicio.',
                'modelShow' => true
            ]);
        }

        $servicio->save();

        return redirect()->route('Servicios')->with([
            'successServicio' => 'Servicio actualizado correctamente.',
            'modelShow' => true
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
