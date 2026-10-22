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
        Schema::create('personagem_atual', function (Blueprint $table) {
            $table->id();
            //Dono-personagem
            $table->foreignId('user_id')
                ->constrained('usuario')
                ->onDelete('cascade');
            //id do personagem
            $table->foreignId('personagem_id')
                ->constrained('personagens_status');
            //informações do personagem
            $table->string('nome');
            $table->foreignId('raca_id')
                ->constrained('racas');
            $table->foreignId('classe_id')
                ->constrained('classes');
            //atributos do personagem
            $table->integer('forca');
            $table->integer('vigor');
            $table->integer('agilidade');
            $table->integer('magia');
            $table->integer('inteligencia');
            //progressão do personagem
            $table->integer('nivel')->default(1);
            $table->integer('experiencia')->default(0);
            //vida do personagem
            $table->integer('vida_atual');
            $table->integer('vida_maxima');
            $table->integer('pontos');
            //habilidade e tecnica do personagem
            $table->foreignId('habilidade_tecnica_id')
                ->constrained('personagem_t_h');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
