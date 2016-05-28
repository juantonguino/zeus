<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\EmpresaTransporte;

use App\Utilities\LogManager;

use Auth;

use Laracasts\Flash\Flash;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $empresas= EmpresaTransporte::orderBy('nombre','ASC')->paginate(10);
      //dd($usuarios);
      return view('admin.empresas.index',['empresas'=>$empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa=new EmpresaTransporte();
        $empresa->nombre=$request->nombre;
        $empresa->telefono=$request->telefono;
        $empresa->direccion=$request->direccion;
        //dd($empresa);
        $empresa->save();
        Flash::success('Se ha agregado la nueva Empresa <b>'.$empresa->nombre.'</b> satisfactoriamente');
        return redirect()->route('admin.empresas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $empresa= EmpresaTransporte::find($id);
      return view('admin.empresas.view',['empresa'=>$empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa= EmpresaTransporte::find($id);
        return view('admin.empresas.edit')->with('empresa',$empresa);
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
      $empresa=EmpresaTransporte::find($id);
      $old_values=EmpresaTransporte::find($id);

      $empresa->nombre=$request->nombre;
      $empresa->telefono=$request->telefono;
      $empresa->direccion=$request->direccion;

      //dd($usuario);
      $new_values=$empresa;
      $type=EmpresaTransporte::class;
      $empresa->save();
      LogManager::insertLogUpdate($old_values, $new_values, $type, Auth::user()->name);
      Flash::warning('Se ha modificado la Empresa <b>'.$empresa->nombre.'</b> satisfactoriamente');
      return redirect()->route('admin.empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa= EmpresaTransporte::find($id);
        $empresa->delete();

        Flash::error('La Empresa <b>'.$empresa->nombre.'</b> ha sido eliminado');
        return redirect()->route('admin.empresas.index');

    }
}
