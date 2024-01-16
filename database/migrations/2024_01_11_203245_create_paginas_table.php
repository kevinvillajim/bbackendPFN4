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
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_creacion');
            $table->unsignedBigInteger('usuario_modificacion');
            $table->foreign('usuario_creacion')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('usuario_modificacion')->references('id')->on('usuarios')->onDelete('cascade');
            $table->string('url');
            $table->boolean('estado')->default(true);
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('img');
            $table->string('tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};
