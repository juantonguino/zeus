<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use App\User;

use App\Grupo;

use App\Guia;

use App\Vehiculo;

use App\Dia;

use App\GuiaDia;

use App\VehiculoDia;

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
      $grupos=$this->getGroupsDate($fechas_consultar);
      $guias=$this->getGuias();
      $transportes=$this->getTransporte();
      return view('admin.asignar.asignar', [
        'fechas_mostrar'=>$fechas_mostrar,
        'grupos'=>$grupos,
        'fechas_consultar'=>$fechas_consultar,
        'guias'=>$guias,
        'transportes'=>$transportes
      ]);
    }

    public function guardar(Request $request)
    {
      $dias=Dia::all();
      foreach ($dias as $dia) {
        $guia=$request['guia_id_dia'.$dia->id];
        $transporte=$request['transporte_id_dia'.$dia->id];
        if($guia!=null){
          $relacion_guia= new GuiaDia();
          $relacion_guia->guia_id=$guia;
          $relacion_guia->dia_id=$dia->id;
          $relacion_guia->save();
        }
        if($transporte!=null){
          $relacion_vehiculo= new VehiculoDia();
          $relacion_vehiculo->vehiculo_id=$transporte;
          $relacion_vehiculo->dia_id=$dia->id;
          $relacion_vehiculo->save();
        }
      }
      return redirect()->route('admin.asignar.index');
    }

    /**
     * Metodos de Ayuda
     *
     */
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

    public function getGroupsDate($dates)
    {
      $retorno = array();
      $grupos=Grupo::all();
      for ($i=0; $i < sizeof($dates); $i++) {
        $fecha=$dates[$i];
        for ($j=0; $j < sizeof($grupos); $j++) {
          $grupo=$grupos[$j];
          $dias=$grupo->dias;
          for ($k=0; $k < sizeof($dias); $k++) {
            $dia=$dias[$k];
            if($dia->fecha==$fecha){
                //array_push($retorno,$grupo);
                $retorno=$this->addGroupToArray($grupo, $retorno);
            }
          }
        }
      }
      return $retorno;
    }

    public function addGroupToArray($group, $array)
    {
      $ban=false;
      for ($i=0; $i < sizeof($array) && $ban==false; $i++) {
        $item=$array[$i];
        if($item->id==$group->id){
          $ban=true;
        }
      }
      if ($ban==false) {
        array_push($array,$group);
      }
      return $array;
    }

    public function getGuias()
    {
      $guias=Guia::all()->lists('nombres', 'id');
      return $guias;
    }

    public function getTransporte()
    {
      $transportes=Vehiculo::all()->lists('placa', 'id');
      return $transportes;
    }
}
