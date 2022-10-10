<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producao extends Model
{
    protected $table = 'producao';

    protected $fillable = [
        'producaoAnimal',
        'producaoTipo',
        'producaoDescricao',
        'producaoValorEstimado',
        'producaoQuantidade'
    ];

    public $timestamps = false;

    function tipo_producao(){
        return $this->hasMany(Tipo_Producao::class, 'ID', 'producaoTipo');
    }
    function animal(){
        return $this->hasMany(Animal::class, 'ID', 'producaoAnimal');
    }
}
