<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Solicitud extends Model
{


    protected $table = "solicitudes";

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'fecha_entrega_cliente',
        'fecha_entrega_cuentas',
        'recurrente',
        'prioridad_id',
        'fase_servicio_id',
        'area_id',
        'tipo_estado_id',
        'usuario_id',
        'cliente_id',
    ];


    /**
     * Trae la prioridad que pertenece a la solicitud.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function prioridad(): belongsTo
    {
        return $this->belongsTo(Prioridad::class,'prioridad_id','id');
    }


    /**
     * Trae el tipo de fase que pertenece la solicitud.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoFase(): BelongsTo
    {
        return $this->belongsTo(Fase_servicio::class, 'fase_servicio_id', 'id');
    }


    /**
     * Trae el usuario que pertenece a la solicitud.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    /**
     * Trae el estado que pertenece a la solicitud.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo_estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'tipo_estado_id', 'id');
    }

    /**
     * Trae el área que pertenece a la solicitud.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }


    /**
     * Trae todas las notificaciones que pertenece a la solicitud.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Notificiones(): HasMany
    {
        return $this->hasMany(Notificacion::class, 'solicitud_id', 'id');
    }



}
