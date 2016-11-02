<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Grupo;

use App\Hotel;

use App\Dia;

use App\Utilities\LogManager;

use Carbon\Carbon;

use Auth;

use Laracasts\Flash\Flash;

class DiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $grupo= Grupo::find($id);
        $dias= Dia::where('grupo_id',$id)->orderBy('fecha','DESC')->paginate(10);
        $hoteles= Hotel::all();
        foreach ($dias as $dia) {
          $dia->fecha=Carbon::parse($dia->fecha)->format('Y/m/d');
          if ($dia->hotel_id!=null){
              $dia->hotel_id=Hotel::find($dia->hotel_id)->nombre;
          }
          else{
              $dia->hotel_id= "No Aplica";
          }
        }
        return view('admin.dia.index', ['grupo'=>$grupo,'dias'=>$dias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $hoteles= Hotel::all();
      $listahoteles= array();
      foreach ($hoteles as $hotel) {
        $listahoteles["$hotel->id"]=$hotel->nombre;
      }
      $listahoteles["null"]="No Aplica";
      return view('admin.dia.create', ['id'=>$id, 'listahoteles'=>$listahoteles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      $dia= new Dia();
      $dia->destino=$request->destino;
      $dia->dinero_asignado=$request->dinero_asignado;
      $dia->total_gastado=$request->total_gastado;
      $dia->fecha=$request->fecha;
      $dia->hotel_id=$request->hotel_id;
      $dia->instrucciones_recorrido_guia= $request->instrucciones_recorrido_guia;
      $dia->recorrido_plan=$request->recorrido_plan;
      $dia->grupo_id=$id;
      if($dia->hotel_id=="null"){
          $dia->hotel_id=null;
      }
      $dia->save();
      $dia->fecha=Carbon::parse($dia->fecha)->format('Y/m/d');
      Flash::success('Se ha agregado el Dia <b>'.$dia->fecha.'</b> satisfactoriamente');
      return redirect()->route('admin.dia.index',['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $dia=Dia::find($id);
      $dia->fecha=Carbon::parse($dia->fecha)->format('Y-m-d');
      $hoteles= Hotel::all();
      $listahoteles= array();
      foreach ($hoteles as $hotel) {
        $listahoteles["$hotel->id"]=$hotel->nombre;
      }
      if($dia->hotel_id==null){
          $dia->hotel_id="null";
      }
      $listahoteles["null"]="No Aplica";
      $dia->fecha_mostrar=Carbon::parse($dia->fecha)->format('Y/m/d');
      return view('admin.dia.view',['dia'=>$dia, 'listahoteles'=>$listahoteles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $dia=Dia::find($id);
      $dia->fecha_mostrar=Carbon::parse($dia->fecha)->format('Y/m/d');
      $dia->fecha=Carbon::parse($dia->fecha)->format('Y-m-d');
      $hoteles= Hotel::all();
      $listahoteles= array();
      foreach ($hoteles as $hotel) {
        $listahoteles["$hotel->id"]=$hotel->nombre;
      }
      if($dia->hotel_id==null){
          $dia->hotel_id="null";
      }
      $listahoteles["null"]="No Aplica";
      return view('admin.dia.edit',['dia'=>$dia,'listahoteles'=>$listahoteles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $dia=Dia::find($id);
      $dia->destino=$request->destino;
      $dia->instrucciones_recorrido_guia=$request->instrucciones_recorrido_guia;
      $dia->recorrido_plan=$request->recorrido_plan;
      $dia->fecha=$request->fecha;
      $dia->total_gastado=$request->total_gastado;
      $dia->dinero_asignado=$request->dinero_asignado;
      $dia->hotel_id=$request->hotel_id;

      if($dia->hotel_id=="null"){
          $dia->hotel_id=null;
      }

      $dia->save();
      $fecha=$dia->fecha=Carbon::parse($dia->fecha)->format('Y/m/d');
      Flash::warning('Se ha modificado el dia '.$fecha.' satisfactoriamente');
      return redirect()->route('admin.dia.index', ['id'=>$dia->grupo_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $dia= Dia::find($id);
      $grupo= $dia->grupo_id;
      $dia->delete();
      $fecha=$dia->fecha=Carbon::parse($dia->fecha)->format('Y/m/d');
      Flash::error('El Dia <b>'.$fecha.'</b> ha sido eliminado');
      return redirect()->route('admin.dia.index',['id'=>$grupo]);
    }
}
