<?php

namespace App\Http\Controllers\Administrador\Home;

use Illuminate\Support\Facades\Route;

class homeController
{
    /**
     * Muestra un listado de recursos.
     */

    public function index(){
        $nameRoute = Route::currentRouteName();
        return view('Administrador.Home.home', compact('nameRoute'));
    }


}
