<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historial_solicitud extends Model
{

    protected $table = "historial_solicitudes";

    protected $fillable = [

        'nombre',
        'descripcion',
        'fecha_entrega_cliente',
        'fecha_entrega_cuentas',
        'recurrente',
        'fase_servicio_id',
        'prioridad_id',
        'created_at',
        'updated_at',

    ];

 

}
