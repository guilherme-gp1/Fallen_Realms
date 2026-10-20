<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personagem_status extends Model
{
    protected $table = 'personagens_status';

    protected $fillable = [
        'user_id',
        'nome', 
        'raca_id',
        'classe_id',
        'forca',
        'vigor',
        'agilidade',
        'magia',
        'inteligencia',
        'nivel',
        'experiencia',
        'vida_atual',
        'vida_maxima',
        'pontos',
    ];
}
