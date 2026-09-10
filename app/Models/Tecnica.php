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
        'valor',
        'custo',
        'cooldown',
    ];

    public function personagens()
    {
        return $this->belongsToMany(Personagens::class, 'personagem_tecnica', 'tecnica_id', 'personagem_id')
            ->withPivot('nivel', 'experiencia', 'desbloqueada')
            ->withTimestamps();
    }
}
