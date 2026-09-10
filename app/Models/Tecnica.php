<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnica extends Model
{
    protected $table = 'tecnicas';

    protected $fillable = [
        'nome',
        'descricao',
        'tipo',
        'dano',
        'custo',
        'cooldown',
        'nivel_minimo'
    ];

    public function personagens()
    {
        return $this->belongsToMany(Personagens::class, 'personagem_tecnica', 'tecnica_id', 'personagem_id')
            ->withPivot('nivel', 'experiencia', 'desbloqueada')
            ->withTimestamps();
    }
}
