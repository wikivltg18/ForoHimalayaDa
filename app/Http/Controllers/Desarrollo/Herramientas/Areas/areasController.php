<?php

namespace App\Http\Controllers\Desarrollo\Herramientas\Areas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Area;
class areasController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Herramientas.Areas.areas',compact('nameRoute'));

    }

    /**
     * Get all areas date.
     */

    public function apiAreas()
    {
        $areas = Area::all();
        return response()->json(['data' => $areas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Herramientas.Areas.crear_area',compact('nameRoute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'ar-nombre.required' => 'El nombre del área es obligatorio.',
            'ar-nombre.string'   => 'El nombre del área debe ser texto.',
            'ar-nombre.max'      => 'El nombre del área no debe superar los 45 caracteres.',

            'ar-descripcion.string'   => 'La descripción debe ser texto.',
            'ar-descripcion.max'      => 'La descripción no debe superar los 200 caracteres.',
        ];

        $validate = $request->validate([
            'ar-nombre' => 'required|string|max:45',
            'ar-descripcion' => 'nullable|string|max:200'
        ], $messages);

        Area::create([
            'nombre' => $validate['ar-nombre'],
            'descripcion' => $validate['ar-nombre'],
        ]);



        return redirect()->route('Áreas')->with([
            'successArea' => 'Área creada correctamente',
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
    public function edit($id)
    {
        $nameRoute = Route::currentRouteName();
        $area = Area::findOrFail($id);
        return view('Desarrollo.Herramientas.Areas.editar_area', compact('nameRoute','area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $messages = [

            'ar-nombre.required' => 'El nombre del área es obligatorio.',
            'ar-nombre.string'   => 'El nombre del área debe ser texto.',
            'ar-nombre.max'      => 'El nombre del área no debe superar los 45 caracteres.',

            'ar-descripcion.string'   => 'La descripción debe ser texto.',
            'ar-descripcion.max'      => 'La descripción no debe superar los 200 caracteres.',
        ];

        $validate = $request->validate([
            'ar-nombre' => 'required|string|max:45',
            'ar-descripcion' => 'nullable|string|max:200',
        ], $messages);

        $area = Area::findOrFail($id);

        $area->nombre = $validate['ar-nombre'];
        $area->descripcion = $validate['ar-descripcion'] ?? null;


        if(!$area->isDirty())
        {
            return redirect()->route('Editar Área',['id' => $id])->with([
                'warningUpdateArea' => 'No se detecto ningun cambio para el área.',
                'modelShow' => true,
            ]);
        }

        $area->save();

        return redirect()->route('Áreas')->with([
            'successUpdateArea' => 'Área actualizada correctamente',
            'modelShow' => true
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
    }
}
