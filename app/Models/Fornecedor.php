<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedor';

    protected $fillable = [
        'fornecedorNome',
        'fornecedorCnpjCPF',
        'fornecedorAtivo'
    ];

    public $timestamps = false;
}
