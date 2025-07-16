<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('historial_solicitudes', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();

            $table->string('nombre',150);
            $table->string('descripcion',150);
            $table->dateTime('fecha_entrega_cliente');
            $table->dateTime('fecha_entrega_cuentas');
            $table->boolean('recurrente')->default(0);

            $table->unsignedBigInteger('solicitud_id');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes');

            $table->boolean('estado')->default(0);
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
        Schema::dropIfExists('historial_solicitudes');
    }
};
