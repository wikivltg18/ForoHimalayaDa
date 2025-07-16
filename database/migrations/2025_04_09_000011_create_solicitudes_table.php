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
        Schema::create('solicitudes', function (Blueprint $table) {

            $table->engine="InnoDB";

            $table->id();

            // Datos solicitudes.

            $table->string('nombre',50);
            $table->string('descripcion',500);
            $table->dateTime('fecha_entrega_cliente');
            $table->dateTime('fecha_entrega_cuentas');

            $table->boolean('recurrente')->default(0);

            // Llaves Foraneas.

            $table->foreign('prioridad_id')->references('id')->on('prioridades');
            $table->unsignedBigInteger('prioridad_id');

            $table->foreign('area_id')->references('id')->on('areas');
            $table->unsignedBigInteger('area_id');

            $table->unsignedBigInteger('fase_servicio_id');
            $table->foreign('fase_servicio_id')->references('id')->on('fases_servicios');

            $table->unsignedBigInteger('tipo_estado_id');
            $table->foreign('tipo_estado_id')->references('id')->on('areas');

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            // Tiempo/Estado.

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
        Schema::dropIfExists('solicitudes');
    }
};
