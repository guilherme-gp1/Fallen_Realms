<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personagem_Tecnica extends Model
{
    protected $table = 'personagem_tecnica';

    protected $fillable = [
        'personagem_id',
        'tecnica_id',
        'nivel',
        'experiencia',
        'desbloqueada'
    ];
}
