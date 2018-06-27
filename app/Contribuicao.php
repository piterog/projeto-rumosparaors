<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribuicao extends Model
{
    protected $table = 'contribuicoes';

    protected $fillable = [
        'nome', 'email', 'telefone', 'cidade', 'area', 'sugestao', 'visivel'
    ];
}
