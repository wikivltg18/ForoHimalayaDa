<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
Use Illuminate\Support\Carbon;

class Servicio extends Model
{
    protected $fillable = [

        'nombre',
        'descripcion',
        'cliente_id',
        'tablero_id',
        'created_at',
        'estado',
        'updated_at'

    ];

    // public function getCreatedAtColAttribute()
    // {
    //     return Carbon::parse($this->created_at)
    //         ->timezone('America/Bogota')
    //         ->format('d/m/Y h:i A');
    // }

    public function faseServicio():HasMany
    {
        return $this->hasMany(Fase_servicio::class,'servicio_id','id');
    }

        /**
     * Trae el tablero que pertenece a al servicio.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tablero(): BelongsTo
    {
        return $this->belongsTo(Tablero::class, 'tablero_id', 'id');
    }


          /**
     * Trae el cliente que pertenece al servicio.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

}
