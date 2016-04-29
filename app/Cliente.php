<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table="cliente";

    public function grupo()
    {
      	return $this->belongsTo('App\Grupo');
    }
}
