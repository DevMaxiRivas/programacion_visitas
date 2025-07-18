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
            $table->date('fecha_visita');
            $table->date('fecha_visita_reprogramada')->nullable();
            $table->text('indicaciones')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('url_archivos')->nullable();
            $table->text('nombres_archivos_originales')->nullable();
            $table->text('url_imagenes')->nullable();
            $table->text('nombres_imagenes_originales')->nullable();
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
