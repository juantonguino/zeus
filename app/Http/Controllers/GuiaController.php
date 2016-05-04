<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Guia;

use Carbon\Carbon;

use Laracasts\Flash\Flash;

class GuiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $guias=Guia::orderBy('nombres','ASC')->paginate(10);
      return view('admin.guia.index',['guias'=>$guias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.guia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $guia= new Guia();
      $guia->cedula=$request->cedula;
      $guia->nombres=$request->nombres;
      $guia->telefono=$request->telefono;
      $guia->fecha_nacimiento=$request->fecha_nacimiento;
      $guia->correo_electronico=$request->correo_electronico;
      $guia->direccion=$request->direccion;
      $guia->perfil_academico=$request->perfil_academico;
      //dd($guia);
      $guia->save();
      Flash::success('Se ha agregado el guia <b>'.$guia->nombres.'</b> satisfactoriamente');
      return redirect()->route('admin.guia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guia=Guia::find($id);
        $guia->fecha_nacimiento=Carbon::parse($guia->fecha_nacimiento)->format('Y-m-d');
        return view('admin.guia.view',['guia'=>$guia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $guia=Guia::find($id);
      $guia->fecha_nacimiento=Carbon::parse($guia->fecha_nacimiento)->format('Y-m-d');
      return view('admin.guia.edit',['guia'=>$guia]);
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
        $guia=Guia::find($id);
        $guia->cedula=$request->cedula;
        $guia->nombres=$request->nombres;
        $guia->telefono=$request->telefono;
        $guia->fecha_nacimiento=$request->fecha_nacimiento;
        $guia->correo_electronico=$request->correo_electronico;
        $guia->direccion=$request->direccion;
        $guia->perfil_academico=$request->perfil_academico;
        $guia->save();
        Flash::warning('Se ha modificado el guia '.$guia->nombres.' satisfactoriamente');
        return redirect()->route('admin.guia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guia=Guia::find($id);
        $nombres=$guia->nombres;
        $guia->delete();
        Flash::error('el guia <b>'.$nombres.'</b> ha sido eliminado');
        return redirect()->route('admin.guia.index');
    }
}
