<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Tabla: Almacena los datos de los usuarios.

        Schema::create('usuarios', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();

            // Datos personales.

            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('cargo',50);
            $table->string('telefono',50)->unique();
            $table->string('telefono_referencia',50)->unique();
            $table->string('direccion',200)->unique();
            $table->string('descripcion',500);
            $table->string('habilidades',200);
            $table->rememberToken();
            $table->date('fecha_nacimiento');

            // Llave foranea

            $table->unsignedBigInteger('img_perfil_id');
            $table->foreign('img_perfil_id')->references('id')->on('imagenes_perfil');

            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('roles');

            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');


            // Datos authenticación

            $table->string('email',100)->unique();
            $table->string('password',200);

            // Tiempo/Estado

            $table->boolean('estado')->default(1);
            $table->softDeletes()->default(now());
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Tabla: Guarda el token de seguridad para guardar el usuario y se logee automaticamente.

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabla: Encargado de guardar todas las sessiones.

        Schema::create('sessions', function (Blueprint $table) {

            $table->string('id')->primary();

            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
