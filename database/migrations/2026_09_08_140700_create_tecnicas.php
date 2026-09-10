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
        Schema::create('tecnicas', function (Blueprint $table) {
            $table->id();
            // Informações básicas
            $table->string('nome');
            $table->text('descricao')->nullable();

            // Tipo e dano
            $table->string('tipo');
            $table->integer('dano')->default(0);

            // Custo e recarga
            $table->integer('custo')->default(0);
            $table->integer('cooldown')->default(0);

            // Requisito
            $table->integer('nivel_minimo')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnicas');
    }
};
