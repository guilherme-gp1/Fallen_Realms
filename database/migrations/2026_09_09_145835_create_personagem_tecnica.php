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
        Schema::create('personagem_tecnica', function (Blueprint $table) {
            $table->id();
            // Relacionamentos
            $table->foreignId('personagem_id')
                ->constrained('personagens')
                ->onDelete('cascade');

            $table->foreignId('tecnica_id')
                ->constrained('tecnicas')
                ->onDelete('cascade');

            // Progresso da técnica
            $table->integer('nivel')->default(1);
            $table->integer('experiencia')->default(0);

            // Desbloqueio
            $table->boolean('desbloqueada')->default(false);

            // Impede a mesma técnica duplicada no personagem
            $table->unique(['personagem_id', 'tecnica_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personagem_tecnica');
    }
};
