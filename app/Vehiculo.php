<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table="vehiculo";

    public function vehiculoDias()
    {
    	return $this->hasToMany('App\VehiculoDia')
    }

    public function conductor()
    {
    	return $this->belongsTo('App\Conductor');
    }

    public function empresaTransportes()
    {
    	return $this->belongsTo('App\EmpresaTransportes')
    }
}
