<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table="usuario";

    public function guia()
    {
    	return $this->belongsTo('App\Guia');
    }
}
