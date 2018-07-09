<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro_votos extends Model
{
    protected $fillable = [
        'nome', 'email', 'telefone'
    ];
}
