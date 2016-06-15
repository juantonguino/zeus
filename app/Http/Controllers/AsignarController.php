<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use App\User;

use App\Grupo;

class AsignarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.asignar.index');
    }

    public function verasignacion(Request $request)
    {
      $fecha_inicio= $request->fecha_inicio;
      $fecha_fin= $request->fecha_fin;
      $fechas_consultar=$this->getArrayDate($fecha_inicio, $fecha_fin);
      $fechas_mostrar=$this->getArrayDateShow($fechas_consultar);
      dd($fechas_mostrar);
    }

    public function getArrayDate($fecha_inicio, $fecha_fin)
    {
      $retorno= array();
      while ($fecha_inicio <= $fecha_fin) {
        $fecha=Carbon::parse($fecha_inicio)->format('Y-m-d');
        array_push($retorno,$fecha);
        $fecha_inicio=(new Carbon($fecha_inicio))->addDays(1);
      }
      return $retorno;
    }

    public function getArrayDateShow($fechas)
    {
      $retorno=array();
      for ($i=0; $i < sizeof($fechas); $i++) {
        $fecha_mostrar= Carbon::parse($fechas[$i])->format('Y/m/d');
        array_push($retorno, $fecha_mostrar);
      }
      return $retorno;
    }
}
