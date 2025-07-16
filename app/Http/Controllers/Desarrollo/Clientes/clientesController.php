<?php

namespace App\Http\Controllers\Desarrollo\Clientes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Fase_servicio;
use App\Models\Servicio;
use App\Models\Usuario;

class clientesController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Clientes.clientes',compact('nameRoute'));
    }


   /**
     * Get all clientes data.
     */
    public function apiClientes()
    {
        $clientes = Cliente::with(['usuario'])->get();
        $clientes = Cliente::with(['usuario', 'contratos'])->get();
        // Ajustar los datos para DataTables
        $clientes = $clientes->map(function($cliente) {
            return [
                'id' => $cliente->id,
                'logo' => $cliente->logo_cliente ? asset('storage/' . $cliente->logo_cliente) : null,
                'nombre' => $cliente->nombre,
                'sitio_web' => $cliente->sitio_web,
                'email' => $cliente->email,
                'usuario' => $cliente->usuario,
                'estado' => $cliente->estado,
                'contratos' => $cliente->contratos->map(function($contrato) { return $contrato->nombre;})

            ];
        });
        return response()->json(['data' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = Usuario::with('rol')->where('rol_id', 1)->get();
        $contratos = Contrato::all();
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Clientes.crear_cliente',compact('nameRoute','usuarios','contratos'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'lg_cliente.image' => 'El logo debe ser una imagen válida.',
            'lg_cliente.mimes' => 'El logo debe ser un archivo de tipo: jpeg, png, jpg, gif o svg.',
            'nm_cliente.required' => 'El nombre del cliente es obligatorio.',
            'nm_cliente.string' => 'El nombre del cliente debe ser una cadena de texto.',
            'nm_cliente.max' => 'El nombre del cliente no debe exceder 25 caracteres.',
            'st_web.string' => 'El sitio web debe ser una cadena de texto.',
            'st_web.max' => 'El sitio web no debe exceder 255 caracteres.',
            'em_cliente.required' => 'El correo electrónico es obligatorio.',
            'em_cliente.string' => 'El correo electrónico debe ser una cadena de texto.',
            'em_cliente.max' => 'El correo electrónico no debe exceder 255 caracteres.',
        ];

        $request->validate([
            'lg_cliente' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'nm_cliente' => 'required|string|max:25',
            'st_web' => 'nullable|string|max:255',
            'em_cliente' => 'required|string|max:255',
            'usuario_id' => 'required|exists:usuarios,id',
            'estado' => 'required|in:0,1',
            'contrato' => 'required|array',
            'contrato.*' => 'exists:contratos,id',
        ],$message);

        // Validación personalizada: al menos uno de los dos checkboxes debe estar marcado
        if (!is_array($request->contrato) || count($request->contrato) < 1) {
            return back()->withErrors(['contrato' => 'Debe seleccionar al menos un contrato.'])->withInput();
        }

        // Guardar el cliente
        $cliente = new Cliente();
        $cliente->nombre = $request->nm_cliente;
        $cliente->logo_cliente = null; // Lógica para guardar el logo si se implementa
        $cliente->sitio_web = $request->st_web;
        $cliente->email = $request->em_cliente;
        $cliente->telefono = $request->telefono_cliente;
        $cliente->telefono_referencia = $request->telefono_referencia_cliente;
        $cliente->usuario_id = $request->usuario_id;
        $cliente->estado = $request->estado;
        $cliente->save();

        // Guardar contratos en la tabla pivote
        $cliente->contratos()->sync($request->contrato);

        return redirect()->route('Clientes')->with('success', 'Cliente creado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nameRoute = Route::currentRouteName();
        $cliente = Cliente::findOrFail($id);
        return view('Desarrollo.Clientes.ver_cliente',compact('nameRoute','cliente'));

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
