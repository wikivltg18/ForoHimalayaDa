<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{

    protected $table = "areas";

    protected $fillable = [

        'id',
        'nombre',
        'descripcion',
        'horas_consumidas',
        'estado',
        'created_at',
        'updated_at'

    ];


    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'area_id', 'id');
    }


}
