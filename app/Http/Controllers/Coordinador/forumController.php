<?php

namespace App\Http\Controllers\Coordinador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class forumController
{


    public function indexCreativity()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Foro.foro_creatividad', compact('nameRoute'));
    }




    public function indexPerformance(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Foro.foro_desarrollo_di_performance',compact('nameRoute'));
    }


    public function indexHomework(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Foro.foro_creacion_tareas',compact('nameRoute'));

    }

    public function listComprasDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Compras.lista_compras',compact('nameRoute'));

    }

    public function divisasDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Herramientas.divisas', compact('nameRoute'));
    }

    public function planeacionDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Herramientas.fases_planeacion', compact('nameRoute'));
    }

    public function tiposDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Herramientas.tipos_compra', compact('nameRoute'));
    }

    public function createOrdenDevelopmente(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Ot.crearOT', compact('nameRoute'));

    }
    public function listOrdenDevelopmente(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Ot.crearOT', compact('nameRoute'));

    }
    public function areaEquipoDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Equipo.areas', compact('nameRoute'));
    }

    public function usuariosEquipoDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Equipo.usuarios', compact('nameRoute'));
    }

    public function traficoDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Informes.trafico', compact('nameRoute'));
    }

    public function soporteDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Informes.soporte', compact('nameRoute'));
    }

    public function historicoUsuariosDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Informes.historico_usuarios', compact('nameRoute'));
    }


    public function historicoClientesDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Informes.historico_clientes', compact('nameRoute'));
    }

    public function historicoAreasDevelopment(){
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Informes.historico_areas', compact('nameRoute'));
    }

}
