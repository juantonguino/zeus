<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuiaDia extends Model
{
    protected $table="guia_dia";

    public function dia()
    {
    	return $this->belongsTo('App\Dia');
    }

    public function guia()
    {
    	return $this->belongsTo('App\Guia');
    }
}
