<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Fase_servicio extends Model
{
    protected $table = "fases_servicios";

    protected $fillable = [
        'nombre',
        'descripcion',
        'servicio_id',
        'created_at',
        'updated_at'
    ];

    public function servicio(): belongsTo
    {
        return $this->belongsTo( Servicio::class,'servicio_id','id' );
    }

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'fase_servicio_id', 'id');
    }

}
