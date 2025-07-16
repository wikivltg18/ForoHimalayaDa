<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen_perfil extends Model
{
    protected $table = "imagenes_perfil";

    protected $fillable = [

        'ruta_imagen',
        'nombre_archivo',
        'tipo_imagen',
        'created_at',
        'updated_at'

    ];


}
