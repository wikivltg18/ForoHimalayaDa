<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estado extends Model
{

    protected $fillable = [

        'id',
        'nombre',
        'descripcion',
        'tipo_estado_id',
        'created_at',
        'updated_at'
    ];

    public function tipoEstado(): BelongsTo
    {
        return $this->belongsTo(Tipo_estado::class,'tipo_estado_id','id');
    }

}
