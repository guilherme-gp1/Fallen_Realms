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
        Schema::create('racas', function (Blueprint $table) {
            $table->id();
            // Informações básicas
            $table->string('nome');
            $table->text('descricao')->nullable();

            // Vida
            $table->integer('vida_base')->default(100);

            // Bônus de atributos
            $table->integer('bonus_forca')->default(0);
            $table->integer('bonus_vigor')->default(0);
            $table->integer('bonus_agilidade')->default(0);
            $table->integer('bonus_magia')->default(0);
            $table->integer('bonus_inteligencia')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racas');
    }
};
