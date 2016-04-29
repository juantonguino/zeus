<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table="grupo";

    public function clientes()
    {
    	return $this->hasMany('App\Cliente');
    }

    public function reservas()
    {
    	return $this->hasMany('App\Reserva');
    }

    public function dias()
    {
    	return $this->hasMany('App\Dia');
    }
}
