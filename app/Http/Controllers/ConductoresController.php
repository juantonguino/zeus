<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Conductor;

use Laracasts\Flash\Flash;

class ConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $conductores= Conductor::orderBy('nombres','ASC')->paginate(10);
      //dd($conductores);
      return view('admin.conductores.index',['conductores'=>$conductores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conductores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $conductor=new Conductor();
      $conductor->cedula=$request->cedula;
      $conductor->nombres=$request->nombres;
      $conductor->telefono=$request->telefono;
      $conductor->fecha_nacimiento=$request->fecha_nacimiento;
      $conductor->direccion=$request->direccion;
      $conductor->correo_electronico=$request->correo_electronico;
      $conductor->perfil_academico=$request->perfil_academico;
      //dd($conductor);
      $conductor->save();
      Flash::success('Se ha agregado el nuevo Conductor <b>'.$conductor->nombres.'</b> satisfactoriamente');
      return redirect()->route('admin.conductores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $conductor= Conductor::find($id);
      return view('admin.conductores.view',['conductor'=>$conductor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $conductor= Conductor::find($id);
      return view('admin.conductores.edit')->with('conductor',$conductor);
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
      $conductor=Conductor::find($id);
      $conductor->cedula=$request->cedula;
      $conductor->nombres=$request->nombres;
      $conductor->telefono=$request->telefono;
      $conductor->fecha_nacimiento=$request->fecha_nacimiento;
      $conductor->direccion=$request->direccion;
      $conductor->correo_electronico=$request->correo_electronico;
      $conductor->perfil_academico=$request->perfil_academico;
      //dd($conductor);
      $conductor->save();
      Flash::warning('Se ha modificado el Conductor <b>'.$conductor->nombres.'</b> satisfactoriamente');
      return redirect()->route('admin.conductores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $conductor= Conductor::find($id);
      $conductor->delete();

      Flash::error('El Conductor <b>'.$conductor->nombres.'</b> ha sido eliminado');
      return redirect()->route('admin.conductores.index');
    }
}
