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
            $table->string('nombres_archivos_originales')->nullable();
            $table->string('url_imagenes')->nullable();
            $table->string('nombres_imagenes_originales')->nullable();
            $table->unsignedSmallInteger('estado')->default(0);
            $table->timestamps();

            $table->foreign('vendedor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
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
