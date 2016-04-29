<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $table="restaurante";

    public function tarifas()
    {
    	return $this->hasToMany('App\TarifaRestaurante');
    }
}
