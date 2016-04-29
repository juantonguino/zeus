<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table="hotel";

    public function dias()
    {
    	return $this->hasToMany('App\Dia');
    }

    public function tarifas()
    {
    	return $this->hasToMany('App\TarifaHotel');
    }
}
