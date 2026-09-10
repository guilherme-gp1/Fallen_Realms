<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    protected $table = 'habilidades';

    protected $fillable = [
        'nome',
        'descricao',
        'tipo',
        'valor',
        'custo',
        'cooldown',
    ];

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'classe_habilidade', 'habilidade_id', 'classe_id')
            ->withTimestamps();
    }
}
