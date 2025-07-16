<?php

namespace App\Http\Controllers\Desarrollo\Divisas;

use Illuminate\Http\Request;
use App\Models\Divisa;
class divisasController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisas = Divisa::all();
        $nameRoute = \Route::currentRouteName();
        return view('desarrollo.herramientas.divisas.divisas', compact('nameRoute','divisas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisas = Divisa::all();
        $nameRoute = \Route::currentRouteName();
        return view('Desarrollo.Herramientas.Divisas.crear_divisa', compact('nameRoute','divisas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'nm-divisa.string' => 'El nombre debe ser una cadena de texto.',
            'nm-divisa.max' => 'El nombre no puede tener más de 45 caracteres.',
            'tz-divisa.decimal' => 'La tasa de conversión debe ser un número con hasta 15 dígitos y 2 decimales.',
        ];
        
        $validateData = $request->validate([
            'nm-divisa' => 'string|max:45',
            'tz-divisa' => 'numeric'
        ], $message);

        
        $create_divisa = Divisa::create([
            'nombre' => $validateData['nm-divisa'],
            'tasa_conversion' => $validateData['tz-divisa'],
            'created_at' => now()
        ]);
        
        if ($create_divisa) {
            return redirect()->route('Divisas')->with([
                'divisaSuccess' => 'La divisa se ha creado correctamente.',
                'alert-type' => 'success',
                'showModel' => true
            ]);
        }else{
            return redirect()->route('Crear divisa')->with([
                'divisaError' => 'La divisa no se ha creado correctamente.',
                'alert-type' => 'error',
                'showModel' => true
            ]);
        }


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
        $divisa_id = Divisa::findOrFail($id);
        $nameRoute = \Route::currentRouteName();
        return view('Desarrollo.Herramientas.Divisas.editar_divisa',compact('nameRoute','divisa_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $message = [
            'nmu-divisa.string' => 'El nombre debe ser una cadena de texto.',
            'nmu-divisa.max' => 'El nombre no puede tener más de 45 caracteres.',
            'tzu-divisa.decimal' => 'La tasa de conversión debe ser un número con hasta 15 dígitos y 2 decimales.',
        ];
        
        $validateData = $request->validate([
            'nmu-divisa' => 'string|max:45',
            'tzu-divisa' => 'numeric'
        ], $message);
    

        $divisa_id = Divisa::findOrFail($id);
        $divisa_id->update([
            'nombre' => $validateData['nmu-divisa'],
            'taza_conversion' => $validateData['tzu-divisa'] ,
            'updated_at' => now()
        ]);

        if ($divisa_id) {
            return redirect()->route('Divisas')->with([
                'divisaUpdateSuccess' => '¡La divisa se ha actualizado correctamente!.',
                'alert-type' => 'success',
                'showModel' => true
            ]);
        }else{
            return redirect()->route('Crear divisa')->with([
                'divisaUpdateError' => '¡La divisa no pudo actualizar correctamente!.',
                'alert-type' => 'error',
                'showModel' => true
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
