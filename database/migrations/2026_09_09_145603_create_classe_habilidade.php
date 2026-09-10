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
        Schema::create('classe_habilidade', function (Blueprint $table) {
            $table->id();
            // Relacionamentos
            $table->foreignId('classe_id')
                ->constrained('classes')
                ->onDelete('cascade');

            $table->foreignId('habilidade_id')
                ->constrained('habilidades')
                ->onDelete('cascade');

            // Impede que a mesma habilidade seja adicionada
            // duas vezes à mesma classe
            $table->unique(['classe_id', 'habilidade_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_habilidade');
    }
};
