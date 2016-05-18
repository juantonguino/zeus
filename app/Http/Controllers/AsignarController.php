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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $fecha_inicio= $request->fecha_inicio;
      $fecha_fin= $request->fecha_fin;
      $grupos=Grupo::all();

      $fechas_consultar=array();
      $fechas_mostrar=array();
      $dias = array();

      while ($fecha_inicio<=$fecha_fin) {
        $fecha_consultar= Carbon::parse($fecha_inicio)->format('Y-m-d');
        $fecha_mostrar= Carbon::parse($fecha_inicio)->format('Y/m/d');

        array_push($fechas_consultar,$fecha_consultar);
        array_push($fechas_mostrar, $fecha_mostrar);

        $fecha_inicio=(new Carbon($fecha_inicio))->addDays(1);
      }

      foreach ($fechas_mostrar as $fecha) {
        foreach ($grupos as $grupo) {
          foreach ($grupo->dias as $dia) {
            dd($dia);
          }
        }
      }
      return view('admin.asignar.asignar', ['fechas_mostrar'=>$fechas_mostrar]);
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
