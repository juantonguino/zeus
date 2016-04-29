<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table="proveedor";

    public function tarifas()
    {
    	return $this->hasToMany('App\TarifaProveedor');
    }
}
