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
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendedor_id')->index();
            $table->unsignedBigInteger('cliente_id')->index();
            $table->date('fecha_visita')->nullable();
            $table->string('indicaciones')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('url_archivos')->nullable();
            $table->string('url_imagenes')->nullable();
            $table->string('estado')->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitas');
    }
};
