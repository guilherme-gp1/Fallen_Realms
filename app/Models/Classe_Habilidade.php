<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe_Habilidade extends Model
{
    protected $table = 'classe_habilidade';

    protected $fillable = [
        'classe_id',
        'habilidade_id'
    ];
}
