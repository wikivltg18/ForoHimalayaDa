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
        Schema::create('historial_tableros', function (Blueprint $table) {

            $table->engine ="InnoDB";
            $table->id();

            $table->unsignedBigInteger('tablero_id');
            $table->foreign('tablero_id')->references('id')->on('tableros');

            $table->string('nombre',150)->unique();
            $table->string('descripcion',1000);

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
        Schema::dropIfExists('historial_tableros');
    }
};
