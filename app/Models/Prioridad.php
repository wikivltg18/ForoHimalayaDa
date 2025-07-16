<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Prioridad extends Model
{
    protected $table = "prioridades";

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'created_at',
        'updated_at'
    ];

    /**
     * Obtenga todas las solicitudes para la Prioridad
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'prioridad_id', 'id');
    }
}
