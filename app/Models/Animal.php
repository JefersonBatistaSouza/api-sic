<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animal';

    protected $fillable = [
        'animalCodigo',
        'animalNome',
        'animalRaca',
        'animalPeso',
        'animalPesoLote',
        'animalPrecoLote',
        'animalPreco',
        'animalNumeroLote',
        'animalOrigem',
        'animalSexo',
        'animalPrenhez',
        'animalLactacao',
        'animalCategoriaAnimal',
        'animalTipo',
        'animalFornecedor',
        'animalPostura',
        'animalCorte',
        'animalSituacao'
    ];
    
    public $timestamps = false;

    public array $rules = [
        'animalCodigo' => 'required|min:2|max:100',
        'animalNome' => 'required|min:2|max:70',
        'animalRaca' => 'required|min:2|max:70',
        'animalOrigem'  => 'required|min:2|max:50|alpha',
        'animalSexo'  => 'required|min:1|max:3|alpha',
        'animalPrenhez'  => 'required|min:2|max:70',
        'animalLactacao' => 'required',
        'animalCategoriaAnimal'  => 'required|',
        'animalTipo'  => 'required|min:2|max:60|alpha',
        'animalFornecedor'  => 'required|numeric'
    ];

    function fornecedor(){
        return $this->hasMany(Fornecedor::class, 'ID', 'animalFornecedor');
    }

    function categoria(){
        return $this->hasMany(Categoria_Animal::class, 'ID', 'animalCategoriaAnimal');
    }

    function producao(){
        return $this->hasMany(Producao::class, 'producaoAnimal', 'ID')->with('tipo_producao');
    }
}
