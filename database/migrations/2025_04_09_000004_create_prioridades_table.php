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
        Schema::create('prioridades', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();

            // Datos prioridades

            $table->string('nombre',45)->unique();
            $table->string('descripcion',200);

            // Tiempo / Estados

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prioridades');
    }
};
