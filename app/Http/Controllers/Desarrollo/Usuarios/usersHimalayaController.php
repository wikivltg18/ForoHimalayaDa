<?php

namespace App\Http\Controllers\Desarrollo\Usuarios;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Role;
use App\Models\Area;
use App\Models\Roles;
use Illuminate\Support\Facades\Route;


class usersHimalayaController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Método para traer el nombre de la ruta
        $nameRoute = Route::currentRouteName();

        // Obtener áreas para el selector
        $areas = Area::select('id', 'nombre')->get();

        // Método para mostrar los usuarios y areas
        $inputQuery = $request->input('searchName');
        $inputQueryArea = $request->input('searchArea');

        // Consulta base de usuarios
        $query = Usuario::with('area:id,nombre'); // Inicia el constructor de consultas
        // Filtrar por nombre si está presente
        if ($inputQuery) {
            $query->where(function ($q) use ($inputQuery) {
                $q->where('nombre', 'LIKE', "%{$inputQuery}%")
                    ->orWhere('apellido', 'LIKE', "%{$inputQuery}%");
            });
        }

        // Filtrar por área si está presente
        if ($inputQueryArea) {
            $query->where('area_id', $inputQueryArea);
        }

        // Paginar resultados
        $requestName = $query->select(['id','nombre', 'apellido', 'cargo', 'area_id'])
            ->paginate(8);

        return view('Desarrollo.Equipo.usuarios', [
            'nameRoute' => $nameRoute,
            'search' => $inputQuery,
            'query' => $requestName,
            'inputArea' => $inputQueryArea,
            'areas' => $areas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nm-user.required' => 'El nombre es obligatorio.',
            'nm-user.string' => 'El nombre debe ser una cadena de texto.',
            'nm-user.max' => 'El nombre no debe exceder los 45 caracteres.',

            'ap-user.required' => 'El apellido es obligatorio.',
            'ap-user.string' => 'El apellido debe ser una cadena de texto.',
            'ap-user.max' => 'El apellido no debe exceder los 45 caracteres.',

            'em-user.required' => 'El correo electrónico es obligatorio.',
            'em-user.email' => 'El correo electrónico debe ser válido.',
            'em-user.unique' => 'Este correo electrónico ya está registrado.',

            'psw-user.required' => 'La contraseña es obligatoria.',
            'psw-user.string' => 'La contraseña debe ser una cadena de texto.',
            'psw-user.min' => 'La contraseña debe tener al menos 8 caracteres.',

            'cr-user.required' => 'La dirección es obligatoria.',
            'cr-user.string' => 'La dirección debe ser una cadena de texto.',
            'cr-user.max' => 'La dirección no debe exceder los 85 caracteres.',

            'tf-user.required' => 'El teléfono es obligatorio.',
            'tf-user.string' => 'El teléfono debe ser una cadena de texto.',
            'tf-user.max' => 'El teléfono no debe exceder los 255 caracteres.',


            'tfr-user.required' => 'El teléfono de referencia es obligatorio.',
            'tfr-user.string' => 'El teléfono de referencia debe ser una cadena de texto.',
            'tfr-user.max' => 'El teléfono de referencia no debe exceder los 255 caracteres.',


            'hr-user.required' => 'El valor numérico es obligatorio.',
            'hr-user.numeric' => 'El valor debe ser un número.',
            'hr-user.regex' => 'El formato del valor numérico no es válido. Debe ser hasta 13 dígitos enteros y 2 decimales.',

            'fh-user.required' => 'La fecha es obligatoria.',
            'fh-user.date' => 'La fecha debe ser válida.',
            'fh-user.date_format' => 'La fecha debe estar en el formato d/m/Y.',

            'rl-user.required' => 'El rol es obligatorio.',
            'rl-user.exists' => 'El rol seleccionado no es válido.',
            'rl-user.string' => 'El rol debe ser una cadena de texto.',

            'ar-user.required' => 'El área es obligatoria.',
            'ar-user.exists' => 'El área seleccionada no es válida.',
            'ar-user.string' => 'El área debe ser una cadena de texto.',
        ];

        $validateData = $request->validate([
            'nm-user' => 'required|string|max:45',
            'ap-user' => 'required|string|max:45',
            'em-user' => 'required|email|unique:users,email',
            'psw-user' => 'required|string|min:8',
            'cr-user' => 'required|string|max:85',
            'tf-user' => 'required|string|max:255',
            'tfr-user' => 'required|string|max:255',
            'hr-user' => [
                'required',
                'numeric',
                'regex:/^\d{1,13}(\.\d{1,2})?$/',
            ],
            'fh-user' => 'required|date',
            'rl-user' => 'required|exists:roles,id|string',
            'ar-user' => 'required|exists:area,id|string',
        ], $messages);

        Usuario::create([
            'nombre' => $validateData['nm-user'],
            'apellido' => $validateData['ap-user'],
            'email' => $validateData['em-user'],
            'password' => bcrypt($validateData['psw-user']),
            'cargo' => $validateData['cr-user'],
            'telefono' => $validateData['tf-user'],
            'numero_referencia' => $validateData['tfr-user'],
            'horas_disponibles' => $validateData['hr-user'],
            'fecha_nacimiento' => $validateData['fh-user'],
            'roles_id' => $validateData['rl-user'],
            'area_id' => $validateData['ar-user'],
        ]);

        return redirect()->route('Usuarios')->with([
            'userSuccess' => 'El usuario se ha creado correctamente.',
            'type' => 'success',
            'modelShow' => true
        ]);

    }


    public function profilesDirectories(Request $request)
    {

        if ($request->ajax()) {
            $search = $request->query('search');
            $usuarios = Usuario::where('nombre', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");

            return response()->json([
                'html' => view('Desarrollo.Equipo.directorio', compact('usuarios'))->render()
            ]);

        }

        $areasFilter = $request->input('areasFilter');
        if ($areasFilter) {
            $queryFilter = Usuario::where('area_id', $areasFilter)->get();
        } else {
            $queryFilter = Usuario::all();
        }

        $usuarios = Usuario::with('areas')->paginate(9);
        $areas = Area::all();
        $nameRoute = Route::currentRouteName();

        return view('Desarrollo.Equipo.directorio', compact('nameRoute', 'usuarios', 'areas', 'queryFilter'));
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profile = Usuario::findOrFail($id);
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Home.profileDesarrollo', compact('nameRoute', 'profile'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $areas = Area::all();
        $roles = Roles::all();
        $usuario = Usuario::findOrFail($id);
        $nameRoute = Route::currentRouteName();

        return view('Desarrollo.Equipo.editarUsuario', compact('areas', 'roles', 'usuario', 'nameRoute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'nmu-user.required' => 'El nombre es obligatorio.',
            'nmu-user.string' => 'El nombre debe ser una cadena de texto.',
            'nmu-user.max' => 'El nombre no debe exceder los 45 caracteres.',

            'apu-user.required' => 'El apellido es obligatorio.',
            'apu-user.string' => 'El apellido debe ser una cadena de texto.',
            'apu-user.max' => 'El apellido no debe exceder los 45 caracteres.',

            'em-user.required' => 'El correo electrónico es obligatorio.',
            'em-user.email' => 'El correo electrónico debe ser válido.',
            'em-user.unique' => 'Este correo electrónico ya está registrado.',

            'psw-user.required' => 'La contraseña es obligatoria.',
            'psw-user.string' => 'La contraseña debe ser una cadena de texto.',
            'psw-user.min' => 'La contraseña debe tener al menos 8 caracteres.',

            'cr-user.required' => 'La dirección es obligatoria.',
            'cr-user.string' => 'La dirección debe ser una cadena de texto.',
            'cr-user.max' => 'La dirección no debe exceder los 85 caracteres.',

            'tf-user.required' => 'El teléfono es obligatorio.',
            'tf-user.string' => 'El teléfono debe ser una cadena de texto.',
            'tf-user.max' => 'El teléfono no debe exceder los 255 caracteres.',


            'tfr-user.required' => 'El teléfono de referencia es obligatorio.',
            'tfr-user.string' => 'El teléfono de referencia debe ser una cadena de texto.',
            'tfr-user.max' => 'El teléfono de referencia no debe exceder los 255 caracteres.',


            'hr-user.required' => 'El valor numérico es obligatorio.',
            'hr-user.numeric' => 'El valor debe ser un número.',
            'hr-user.regex' => 'El formato del valor numérico no es válido. Debe ser hasta 13 dígitos enteros y 2 decimales.',

            'fh-user.required' => 'La fecha es obligatoria.',
            'fh-user.date' => 'La fecha debe ser válida.',
            'fh-user.date_format' => 'La fecha debe estar en el formato d/m/Y.',

            'rl-user.required' => 'El rol es obligatorio.',
            'rl-user.exists' => 'El rol seleccionado no es válido.',
            'rl-user.string' => 'El rol debe ser una cadena de texto.',

            'ar-user.required' => 'El área es obligatoria.',
            'ar-user.exists' => 'El área seleccionada no es válida.',
            'ar-user.string' => 'El área debe ser una cadena de texto.',
        ];

        $validateData = $request->validate([
            'nmu-user' => 'required|string|max:45',
            'apu-user' => 'required|string|max:45',
            'cru-user' => 'required|string|max:85',
            'tfu-user' => 'required|string|max:255',
            'tfru-user' => 'required|string|max:255',
            'hru-user' => [
                    'required',
                    'numeric',
                    'regex:/^\d{1,13}(\.\d{1,2})?$/',
                ],
            'fhu-user' => 'required|date',
            'rlu-user' => 'required|exists:roles,id|string',
            'aru-user' => 'required|exists:areas,id|string',
        ], $messages);

        $usuario = Usuario::findOrFail($id);

        $usuario->update([
            'nombre' => $validateData['nmu-user'],
            'apellido' => $validateData['apu-user'],
            'email' => $request->input('emu-user'),
            'password' => bcrypt($request->input('pswu-user')),
            'cargo' => $validateData['cru-user'],
            'telefono' => $validateData['tfu-user'],
            'numero_referencia' => $validateData['tfru-user'],
            'horas_disponibles' => $validateData['hru-user'],
            'fecha_nacimiento' => $validateData['fhu-user'],
            'roles_id' => $validateData['rlu-user'],
            'area_id' => $validateData['aru-user'],
        ]);

        return redirect()->route('Usuarios')->with([
            'updateSuccess' => '¡Datos del rol actualizados correctamente!',
            'modelShow' => true,
            'type' => 'success',
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
