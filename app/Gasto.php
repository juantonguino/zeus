<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $table="gasto"; 

    public function dia()
     {
     	return $this->belongsTo('App\Dia');
     } 
}
