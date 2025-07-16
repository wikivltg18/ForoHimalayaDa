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

        Schema::create('notificaciones', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();

            $table->unsignedBigInteger('solicitud_id');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes');

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');

            $table->string('mensaje');
            $table->boolean('leido')->default(0);
            $table->string('tipo_entidad')->enum('solicitudes','usuarios');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
