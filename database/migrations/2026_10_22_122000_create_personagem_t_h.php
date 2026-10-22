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
        Schema::create('personagem_t_h', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personagem_id')
            ->constrained('personagens_status');

            $table->foreignId('habilidade_id')
            ->constrained('classe_habilidade')
            ->onDelete('cascade');

            $table->foreignId('tecnica_id')
            ->constrained('tecnicas')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personagem_t_h');
    }
};
