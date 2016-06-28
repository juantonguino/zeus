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

use Laracasts\Flash\Flash;

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
      $select_guia= $this->selectAsignacionGuias($grupos);
      $select_vehiculo= $this->selectAsignacionVehiculos($grupos);

      return view('admin.asignar.asignar', [
        'fechas_mostrar'=>$fechas_mostrar,
        'grupos'=>$grupos,
        'fechas_consultar'=>$fechas_consultar,
        'guias'=>$guias,
        'transportes'=>$transportes,
        'select_guia'=>$select_guia,
        'select_vehiculo'=>$select_vehiculo,
        'fecha_inicio'=>$fecha_inicio,
        'fecha_fin'=>$fecha_fin,
      ]);
    }

    public function guardar(Request $request)
    {
      $dias=Dia::all();
      $fecha_inicio=$request->fecha_inicio;
      $fecha_fin=$request->fecha_fin;
      $fechas_consultar=$this->getArrayDate($fecha_inicio, $fecha_fin);
      $this->deleteRelationsTablesGuiaVehiculo($fechas_consultar);
      $this->addRelationsTablesGuiaVehiculo($dias, $request);
      Flash::success('se ha guardado la asignacion correctamente');
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
      $retorno['fecha']=array();
      $retorno['dia']=array();
      for ($i=0; $i < sizeof($fechas); $i++) {
        $carbon=Carbon::parse($fechas[$i]);
        $fecha_mostrar= $carbon->format('Y/m/d');
        $dia="";
        if ($carbon->dayOfWeek==Carbon::SUNDAY) {
          $dia="Domingo";
        }
        else if($carbon->dayOfWeek==Carbon::MONDAY){
          $dia="Lunes";
        }
        else if($carbon->dayOfWeek==Carbon::TUESDAY){
          $dia="Martes";
        }
        else if($carbon->dayOfWeek==Carbon::WEDNESDAY){
          $dia="Miercoles";
        }
        else if($carbon->dayOfWeek==Carbon::THURSDAY){
          $dia="Jueves";
        }
        else if($carbon->dayOfWeek==Carbon::FRIDAY){
          $dia="Viernes";
        }
        else if($carbon->dayOfWeek==Carbon::SATURDAY){
          $dia="Sabado";
        }
        array_push($retorno['dia'], $dia);
        array_push($retorno['fecha'], $fecha_mostrar);
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

    public function selectAsignacionGuias($grupos)
    {
      $retorno = array();
      foreach ($grupos as $grupo) {
        foreach ($grupo->dias as $dia) {
          $guiasDias=array();
          foreach ($dia->guiaDias as $guiaDia) {
            array_push($guiasDias, $guiaDia->guia_id);
          }
          $retorno[$dia->id]=$guiasDias;
        }
      }
      return $retorno;
    }

    public function selectAsignacionVehiculos($grupos)
    {
      $retorno = array();
      foreach ($grupos as $grupo) {
        foreach ($grupo->dias as $dia) {
          $vehiculosDias=array();
          foreach ($dia->vehiculoDias as $vehiculoDia) {
            array_push($vehiculosDias, $vehiculoDia->vehiculo_id);
          }
          $retorno[$dia->id]=$vehiculosDias;
        }
      }
      return $retorno;
    }

    public function deleteRelationsTablesGuiaVehiculo($fechas_consultar)
    {
      foreach ($fechas_consultar as $fecha) {
        $dia_consultar=Dia::where('fecha',$fecha)->get();
        foreach ($dia_consultar as $dia) {
          foreach ($dia->guiaDias as $objeto) {
            $objeto->delete();
          }
          foreach ($dia->vehiculoDias as $objeto) {
            $objeto->delete();
          }
        }
      }
    }

    public function addRelationsTablesGuiaVehiculo($dias, $request)
    {
      foreach ($dias as $dia) {
        $guias=$request['guia_id_dia'.$dia->id];
        $transportes=$request['transporte_id_dia'.$dia->id];
        if($guias!=null){
          foreach ($guias as $guia) {
            $seleccion=GuiaDia::where('guia_id',$guia)->where('dia_id',$dia->id)->get();
            $relacion_guia= new GuiaDia();
            $relacion_guia->guia_id=$guia;
            $relacion_guia->dia_id=$dia->id;
            $relacion_guia->save();
          }
        }
        if($transportes!=null){
          foreach ($transportes as $transporte) {
            $relacion_vehiculo= new VehiculoDia();
            $relacion_vehiculo->vehiculo_id=$transporte;
            $relacion_vehiculo->dia_id=$dia->id;
            $relacion_vehiculo->save();
          }
        }
      }
    }
}
