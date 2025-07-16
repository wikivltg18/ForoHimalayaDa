<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use App\Jobs\updateImage;
class generalController
{
    public function homeAdministrador()
    {
        $nameRoute = Route::currentRouteName();
        return view('Administrador.' , compact('nameRoute'));
    }

    public function homeDevelopment()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Home.homeDesarrollo' , compact('nameRoute'));
    }

    public function showProfileUser($id)
    {
        $nameRoute = Route::currentRouteName();
        $userAuthenticate = Usuario::select([
            'usuarios.id',
            'usuarios.nombre',
            'usuarios.apellido',
            'usuarios.email',
            'usuarios.img_perfil_id',
            'usuarios.direccion',
            'usuarios.telefono',
            'usuarios.telefono_referencia',
            'usuarios.fecha_nacimiento',
            'roles.id as role_id',
            'roles.nombre as role_name',
            'areas.id as area_id',
            'areas.nombre as area_name'
        ])
            ->leftJoin('roles', 'usuarios.rol_id', '=', 'roles.id')
            ->leftJoin('areas', 'usuarios.area_id', '=', 'areas.id')
            ->where('usuarios.id', $id)
            ->firstOrFail();

        return view('Administrador.Home.profileAdmin',compact('nameRoute','userAuthenticate'));
    }

    public function updateImage(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $imagenPath = $request->file('image')->store('imagenes_temporales');

        $nuevoNombre = time() .'.jpg';

        updateImage::dispatch($imagenPath, $nuevoNombre);
    }
}
