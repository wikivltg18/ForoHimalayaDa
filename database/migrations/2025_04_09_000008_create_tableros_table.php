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
        Schema::create('tableros', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();
            // Datos tableros

            $table->string('nombre',100);
            $table->string('descripcion',100);

            // Llave foranea.

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            // Tiempo/Estado

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tableros');
    }
};
