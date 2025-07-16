<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Red_social extends Model
{
    // Define la tabla relacionada.
    protected $table = "redes_sociales";

    // Define los campos a usar.
    protected $fillable = [

        'nombre',
        'url',
        'usuario_id',
        'cliente_id',
        'estado',
        'created_at',
        'updated_at'

    ];

    /**
     * Obtenga todas las solicitudes para la Prioridad
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class,'usuario_id','id');
    }

    /**
     * Obtenga todas las solicitudes para la Prioridad
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }
}
