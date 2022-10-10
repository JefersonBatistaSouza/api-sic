<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Producao extends Model
{
    protected $table = 'tipo_producao';

    protected $fillable=[
        'tipoProducao',
        'unidadeMedida',
        'tipoProducaoAtivo'
    ];

    public $timestamps = false;

    function producao(){
        return $this->hasMany(Producao::class, 'producaoTipo','ID');
    }

}
