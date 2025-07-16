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
        Schema::create('estados', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();

            $table->string('nombre');
            $table->string('descripcion',300)->nullable();

            //LLAVE FORANEA

            $table->unsignedBigInteger('tipo_estado_id');
            $table->foreign('tipo_estado_id')->references('id')->on('tipos_estados');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados');
    }
};
