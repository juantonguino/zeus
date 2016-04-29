<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiculoDia extends Model
{
    protected $table="vehiculo_dia";

    public function dia()
    {
    	return $this->belongsTo('App\Dia');
    }

    public function vehiculo()
    {
    	return $this->belongsTo('App\Vehiculo');
    }
}
