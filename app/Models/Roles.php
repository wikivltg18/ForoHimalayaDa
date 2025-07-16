<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Roles extends Model
{

    protected $table = "roles";

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'created_at',
        'updated_at'
    ];

        /**
     * Trae el área que pertenece a la solicitud.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuarios(): HasMany
    {
        return $this->HasMany(Usuario::class, 'rol_id', 'id');
    }


}
