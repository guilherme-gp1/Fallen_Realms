<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Personagens extends Model
{
    protected $table = 'personagens';

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
    ];

    public function raca(): BelongsTo
    {
        return $this->belongsTo(Raca::class, 'raca_id');
    }

    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tecnicas()
    {
        return $this->belongsToMany(Tecnica::class, 'personagem_tecnica', 'personagem_id', 'tecnica_id')
            ->withPivot('nivel', 'experiencia', 'desbloqueada')
            ->withTimestamps();
    }
}
