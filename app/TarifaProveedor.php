<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifaProveedor extends Model
{
    protected $table="tarifa_proveedor";

    public function restaurante()
    {
    	return $this->belongsTo('App\Proveedor');
    }
}
