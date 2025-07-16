<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = [

        'id',
        'nombre',
        'logo_cliente',
        'sitio_web',
        'email',
        'telefono',
        'telefono_referencia',
        'usuario_id',
        'estado',
        'deleted_at'

    ];

    
    /**
     * Relación: Un cliente pertenece a un usuario.
     * @return BelongsTo
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id','id' );
    }


    /**
     * Relación: Un cliente puede tener muchas redes sociales.
     * @return HasMany
     */
    public function redes_sociales(): HasMany
    {
        return $this->hasMany(Red_social::class,'cliente_id','id');
    }
    /**
     * Relación: Un cliente puede tener muchos contratos.
     * @return BelongsToMany
     */
    public function contratos(): BelongsToMany  
    {
        return $this->belongsToMany(Contrato::class, 'contrato_cliente', 'cliente_id', 'contrato_id')->withTimestamps();
    }

}
