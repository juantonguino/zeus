<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table="dia";

    public function gastos()
    {
    	return $this->hasMany('App\Gasto');
    }

    public function grupo()
    {
    	return $this->belongsTo('App\Grupo');
    }

    public function guiaDias()
    {
    	return $this->hasMany('App\GuiaDia');
    }

    public function vehiculoDias()
    {
    	return $this->hasMany('App\VehiculoDia');
    }

    public function hotel()
    {
    	return $this->belongsTo('App\Hotel');
    }
}
