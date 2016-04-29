<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifaRestaurante extends Model
{
    protected $table="tarifa_restaurante";

    public function restaurante()
    {
    	return $this->belongsTo('App\Restaurante');
    }
}
