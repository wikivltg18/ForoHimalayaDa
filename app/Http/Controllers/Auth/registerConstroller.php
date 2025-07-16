<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class registerConstroller
{
    public function index()
    {
        $nameRoute = \Route::currentRouteName();
        return view('registro.register',compact('nameRoute'));
    }
}
