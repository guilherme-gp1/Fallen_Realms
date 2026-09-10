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
        Schema::create('habilidades', function (Blueprint $table) {
            $table->id();
            // Informações básicas
            $table->string('nome');
            $table->text('descricao')->nullable();

            // Tipo e efeito
            $table->string('tipo');
            $table->integer('valor')->default(0);

            // Custo e tempo de recarga
            $table->integer('custo')->default(0);
            $table->integer('cooldown')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habilidades');
    }
};
