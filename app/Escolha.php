<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escolha extends Model
{
    protected $fillable = [
        'prioridade_id', 'ip',
    ];
}
