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
        Schema::create('clientes', function (Blueprint $table) {

            $table->engine('InnoDB');
            $table->id();


            // Datos personales.

            $table->string('nombre',250);
            $table->string('logo_cliente');
            $table->string('sitio_web', 500)->unique();
            $table->string('email')->unique();
            $table->string('mapa_cliente')->unique();
            $table->string('telefono',50)->unique();
            $table->string('telefono_referencia',50)->unique();
            $table->string('redes_sociales',200);

            // Llave foranea

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');

            $table->unsignedBigInteger('contrato_id');
            $table->foreign('contrato_id')->references('id')->on('clientes');


            // Tiempo/Estado
            $table->boolean('estado');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
