<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Laracasts\Flash\Flash;

use Carbon\Carbon;

use App\Grupo;

use App\Utilities\LogManager;

use App\Reserva;

use Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $grupo= Grupo::find($id);
        //$reservas=$grupo->reservas;
        $reservas= Reserva::where('grupo_id',$id)->orderBy('fecha', 'DESC')->paginate(10);
        foreach ($reservas as $reserva) {
            $reserva->hora=Carbon::parse($reserva->fecha)->format('H:m');
            $reserva->fecha=Carbon::parse($reserva->fecha)->format('Y/m/d');
        }
        return view('admin.reserva.index', ['reservas'=>$reservas, 'grupo'=>$grupo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.reserva.create', ['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $reserva= new Reserva();

        $reserva->nombre=$request->nombre;
        $reserva->concepto=$request->concepto;
        $reserva->fecha=$request->fecha." ".$request->hora;
        $reserva->valor=$request->valor;
        $reserva->lugar=$request->lugar;
        $reserva->grupo_id=$id;

        $reserva->save();
        Flash::success('Se ha agregado la Reserva <b>'.$reserva->nombre.'</b> satisfactoriamente');
        return redirect()->route('admin.reserva.index', ['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $reserva=Reserva::find($id);
      $reserva->hora= Carbon::parse($reserva->fecha)->format('H:m');
      $reserva->fecha=Carbon::parse($reserva->fecha)->format('Y-m-d');
      return view('admin.reserva.view', ['reserva'=>$reserva]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva=Reserva::find($id);
        $reserva->hora= Carbon::parse($reserva->fecha)->format('H:m');
        $reserva->fecha=Carbon::parse($reserva->fecha)->format('Y-m-d');
        return view('admin.reserva.edit', ['reserva'=>$reserva]);
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
      $reserva=Reserva::find($id);
      $old_values=Reserva::find($id);
      $reserva->lugar=$request->lugar;
      $reserva->valor=$request->valor;
      $reserva->nombre=$request->nombre;
      $reserva->fecha=$request->fecha." ".$request->hora;
      $new_values=$reserva;
      $type=Reserva::class;
      $reserva->save();
      LogManager::insertLogUpdate($old_values, $new_values, $type, Auth::user()->name);
      Flash::warning('la Reserva a normbre de  <b>'.$reserva->nombre.'</b> en el lugar <b>'.$reserva->lugar.'</b> ha sido Editada');
      return redirect()->route('admin.reserva.index',['id'=>$reserva->grupo_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva=Reserva::find($id);
        $nombre= $reserva->nombre;
        $lugar= $reserva->lugar;
        $grupo=$reserva->grupo_id;
        $reserva->delete();
        Flash::error('la Reserva a normbre de  <b>'.$nombre.'</b> en el lugar <b>'.$lugar.'</b> ha sido eliminado');
        return redirect()->route('admin.reserva.index',['id'=>$grupo]);
    }
}
