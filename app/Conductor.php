<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table="conductor";

    public function vehiculos()
    {
    	$this->hasToMany('App\Vehiculo');
    }
}
