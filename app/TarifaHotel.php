<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifaHotel extends Model
{
    protected $table="tarifa_hotel";

    public function hotel()
    {
    	return $this->belongsTo('App\Hotel');
    }
}
