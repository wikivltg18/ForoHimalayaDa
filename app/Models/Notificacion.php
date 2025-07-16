<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notificacion extends Model
{

    protected $table = "notificaciones";

    protected $fillable = [

        'id',
        'mensaje',
        'leido',
        'tipo_entidad',
        'solicitud_id',
        'usuario_id',
        'created_at',
        'updated_at'

    ];

    /**
     * Trae la solicitud que pertenece a la notificación.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(Solicitud::class, 'solicitud_id', 'id');
    }

}
