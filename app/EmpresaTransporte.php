<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaTransporte extends Model
{
    protected $table="empresa_transportes";

    public function vehiculos()
    {
    	return $this->hasToMany('App\Vehiculo');
    }
}
