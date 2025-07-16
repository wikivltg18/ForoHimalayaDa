<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
class loginController
{
    public function showLogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {

        $messages = [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'email.exists' => 'No encontramos un usuario con ese correo electrónico.',
        ];


        $request->validate([
            'email' => ['required', 'email', 'exists:usuarios,email'],
            'password' => ['required'],
        ], $messages);

        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $userRole = Auth::user()->rol_id;

            return match($userRole) {
                1 => redirect()->route('Página principal'),
                2 => redirect()->route('Home Administrador'),
                3 => redirect()->route('Home Colaborador'),
            };
        }else{
           return redirect()->route('Iniciar sesión')->with('loginError', 'El usuario ingresado no se encuentra registrado en el sistema. Por favor, verifique sus datos e intente nuevamente.');
        };
    }
}
