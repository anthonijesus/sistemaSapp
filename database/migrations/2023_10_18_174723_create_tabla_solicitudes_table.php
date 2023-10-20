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
        Schema::create('tabla_solicitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('subcategoria_id');
            $table->string('detalle_sol');
            $table->string('base', 150);
            $table->string('medio_sol', 100);
            $table->string('usuario', 150);
            $table->string('usaurio_mod', 150)->nullable();
            $table->string('estado')->default('Pendiente');
            $table->string('observacion')->nullable();
            $table->string('clasificacion', 100); 
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabla_solicitudes');
    }
};
