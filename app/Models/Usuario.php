<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     *Trae los atributos que se pueden asignar en masa.
     *
     * @var list<string>
     */
    protected $fillable = [

        'id',
        'nombre',
        'apellido',
        'cargo',
        'telefono',
        'telefono_referencia',
        'descripcion',
        'habilidades',
        'email',
        'password',
        'direccion',
        'estado',
        'fecha_nacimiento',
        'remember_token',
        'area_id',
        'rol_id',
        'img_perfil_id',
        'created_at',
        'updated_at',
        'deleted_at'

    ];

    /**
     * Trae el área que pertenece el usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }


        /**
     * Trae el área que pertenece el usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function areas(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }


    /**
     *Los atributos que deben ocultarse para la serialización.
     *
     * @var list<string>
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Trae los atributos que deben ser convertidos.
     *
     * @return array<string, string>
     */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Obtiene todos los clientes para el usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function cliente(): hasMany
    {
        return $this->hasMany(Cliente::class);
    }


    /**
     * Obtiene todos los clientes para el usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function redes_sociales(): hasMany
    {
        return $this->hasMany(Red_social::class,'usuario_id','id');
    }

    /**
     *
     *Trae la imagen que pertenece al usuaria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function imagen_perfil(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'img_perfil_id', 'id');
    }

     /**
     *
     *Trae el rol que pertenece al usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function Rol(): BelongsTo
    {
        return $this->belongsTo(Roles::class, 'rol_id', 'id');
    }



}
