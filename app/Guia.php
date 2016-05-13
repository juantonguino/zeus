<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    protected $table="guia";

    public function guiaDias()
    {
    	return $this->hasToMany('App\GuiaDia');
    }
}
