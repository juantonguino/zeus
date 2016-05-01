<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Grupo;

use App\Hotel;

use App\Dia;

use Carbon\Carbon;

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
          $dia->hotel_id=Hotel::find($dia->hotel_id)->nombre;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
