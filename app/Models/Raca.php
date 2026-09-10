<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    protected $table = 'racas';

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
        return $this->hasMany(Personagens::class, 'raca_id');
    }
}
