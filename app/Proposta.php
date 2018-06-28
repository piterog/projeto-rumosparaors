<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    public function prioridades()
    {
        return $this->hasMany('App\Prioridade');
    }
    
    public function eixo()
    {
        return $this->belongsTo('App\Eixo');
    }
}
