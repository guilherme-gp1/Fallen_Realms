<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'nome',
        'descricao',
        'vida_base',
        'bonus_forca',
        'bonus_vigor',
        'bonus_agilidade',
        'bonus_magia',
        'bonus_inteligencia',
    ];

    public function personagens()
    {
        return $this->hasMany(Personagens::class, 'classe_id');
    }

    public function tecnicas()
    {
        return $this->belongsToMany(Tecnica::class, 'classe_tecnica', 'classe_id', 'tecnica_id')
            ->withPivot('nivel', 'desbloqueada')
            ->withTimestamps();
    }
}
