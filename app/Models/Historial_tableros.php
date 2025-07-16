<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historial_tableros extends Model
{
    protected $table = "historial_tableros";

    protected $fillable = [
        'nombre',
        'descripcion',
        'created_at',
        'updated_at',
        'estados',
        'tablero_id'
    ];

   /**
     * Get the user that owns the Historial_solicitud
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tablero(): BelongsTo
    {
        return $this->belongsTo(Tablero::class, 'tablero_id ', 'id');
    }

}
