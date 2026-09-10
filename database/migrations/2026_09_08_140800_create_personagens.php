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
        Schema::create('personagens', function (Blueprint $table) {
            $table->id();
            //Dono-personagem
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            //informações do personagem
            $table->string('nome');
            $table->foreignId('raca_id')
                ->constrained('racas');
            $table->foreignId('classe_id')
                ->constrained('classes');
            //atributos do personagem
            $table->integer('forca')->default(10);
            $table->integer('vigor')->default(10);
            $table->integer('agilidade')->default(10);
            $table->integer('magia')->default(10);
            $table->integer('inteligencia')->default(10);
            //progressão do personagem
            $table->integer('nivel')->default(1);
            $table->integer('experiencia')->default(0);
            //vida do personagem
            $table->integer('vida_atual')->default(100);
            $table->integer('vida_maxima')->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personagens');
    }
};
