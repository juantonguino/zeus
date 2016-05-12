<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table="usuario";

    public function guia()
    {
    	return $this->belongsTo('App\Guia');
    }
}
