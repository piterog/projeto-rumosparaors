<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eixo extends Model
{
    public function propostas()
    {
        return $this->hasMany('App\Proposta');
    }
}
