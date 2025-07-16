<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo_estado extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     /**
     * Trae todos los estados para el tipó de estado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estados():hasMany
    {
        return $this->hasMany(Estado::class,'tipo_estado_id','id');
    }

     /**
     * Trae todos las solicitudes que les corresponde un estado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitudes():hasMany
    {
        return $this->hasMany(Solicitud::class,'tipo_estado_id','id');
    }

}
