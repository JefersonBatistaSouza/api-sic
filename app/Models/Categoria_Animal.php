<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria_Animal extends Model
{
    protected $table = 'categoria_animal';

    protected $fillable = [
        'categoriaNome',
        'categoriaPorte',
        'categoriaZootecnica',
        'categoriaClassificacao',
        'categoriaAtiva'
    ];

    public $timestamps = false;
}
