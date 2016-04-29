<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaTransportes extends Model
{
    protected $table="empresa_transportes";

    public function vehiculos()
    {
    	$this->hasToMany('App\Vehiculo');
    }
}
