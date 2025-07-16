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
        Schema::create('imagenes_perfil', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();

            $table->string('ruta_imagen',255);
            $table->string('nombre_archivo',255);
            $table->string('tipo_imagen',50);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes_perfil');
    }
};
