<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario_Acessa_Setor extends Model
{
    protected $table='usuario_acessa_setor';
    protected $primaryKey = 'usuarioAcessoID';

    protected $fillable = [
        'usuarioID',
        'setorID',
        'acessoPermitido'
    ];

    public $timestamps = false;

    function setores(){
        return $this->hasMany(Setor::class, 'ID','setorID');
    }

    function usuarios(){
        return $this->hasMany(Usuario::class, 'ID','usuarioID');
    }
}
