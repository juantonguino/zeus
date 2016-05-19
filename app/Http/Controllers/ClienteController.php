<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Laracasts\Flash\Flash;

use App\Cliente;

use App\Grupo;

use Carbon\Carbon;

use App\Utilities\LogManager;

use Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $grupo= Grupo::find($id);
        $clientes= Cliente::where('grupo_id', $id)->orderBy('nombres','ASC')->paginate(10);
        foreach ($clientes as $cliente) {
          $cliente->fecha_nacimiento=Carbon::parse($cliente->fecha_nacimiento)->format('Y/m/d');
        }
        return view('admin.cliente.index',['grupo'=>$grupo,'clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.cliente.create', ['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $cliente= new Cliente();
        $cliente->tipo_documento=$request->tipo_documento;
        $cliente->numero_documento= $request->numero_documento;
        $cliente->nombres=$request->nombres;
        $cliente->telefono=$request->telefono;
        $cliente->direccion=$request->direccion;
        $cliente->correo_electronico=$request->correo_electronico;
        $cliente->fecha_nacimiento=$request->fecha_nacimiento;
        $cliente->grupo_id=$id;
        //dd($cliente);
        $cliente->save();
        Flash::success('Se ha agregado el Cliente <b>'.$cliente->nombres.'</b> satisfactoriamente');
        return redirect()->route('admin.cliente.index', ['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cliente= Cliente::find($id);
      $cliente->fecha_nacimiento=Carbon::parse($cliente->fecha_nacimiento)->format('Y-m-d');
      return view('admin.cliente.view', ['cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cliente= Cliente::find($id);
      $cliente->fecha_nacimiento=Carbon::parse($cliente->fecha_nacimiento)->format('Y-m-d');
      return view('admin.cliente.edit', ['cliente'=>$cliente]);
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
      $cliente=Cliente::find($id);
      $cliente->tipo_documento=$request->tipo_documento;
      $cliente->numero_documento=$request->numero_documento;
      $cliente->nombres=$request->nombres;
      $cliente->telefono=$request->telefono;
      $cliente->direccion=$request->direccion;
      $cliente->correo_electronico=$request->correo_electronico;
      $cliente->fecha_nacimiento=$request->fecha_nacimiento;

      $cliente->save();
      Flash::warning('Se ha modificado el cliente '.$cliente->nombres.' satisfactoriamente');
      //dd($cliente);
      return redirect()->route('admin.cliente.index',['id'=>$cliente->grupo_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cliente= Cliente::find($id);
      $nombres= $cliente->nombres;
      $grupo= $cliente->grupo_id;
      LogManager::insertLogDelete(json_encode($cliente),Cliente::class."", Auth::user()->email);
      $cliente->delete();
      Flash::error('El cliente <b>'.$nombres.'</b> ha sido eliminado');
      return redirect()->route('admin.cliente.index',['id'=>$grupo]);
    }
}
