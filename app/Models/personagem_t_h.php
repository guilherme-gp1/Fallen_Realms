<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class personagem_t_h extends Model
{
    protected $table = 'personagem_t_h';

    protected $fillable = [
        'personagem_id',
        'habilidade_id',
        'tecnica_id'
    ];
}
