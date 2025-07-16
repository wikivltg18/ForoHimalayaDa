<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tablero extends Model
{
    protected $fillable = [

        'nombre',
        'descripcion',
        'cliente_id',
        'tablero_id',
        'created_at',
        'updated_at',
        'deleted_at',

    ];

     /**
     * Trae el historial que pertenece el tablero.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historial_tableros(): HasMany
    {
        return $this->hasMany(Historial_tableros::class,'tablero_id','id');
    }


     /**
     * Obtenga todos los servicios para el tablero.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faseServicio():HasMany
    {
        return $this->hasMany(Fase_servicio::class,'fase_servicio_id','id');
    }



}
