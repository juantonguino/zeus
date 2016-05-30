<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EmpresaTransporte;

use App\Conductor;

use App\Vehiculo;

use App\Http\Requests;

use App\Utilities\LogManager;

use Laracasts\Flash\Flash;

use Auth;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos= Vehiculo::orderBy('id','ASC')->paginate(10);
        foreach ($vehiculos as $vehiculo) {
          $vehiculo->empresa=EmpresaTransporte::find($vehiculo->empresa_transportes_id)->nombre;
          $vehiculo->conductor=Conductor::find($vehiculo->conductor_id)->nombres;
        }
        return view('admin.vehiculo.index', ['vehiculos'=>$vehiculos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas=EmpresaTransporte::all()->lists('nombre', 'id');
        $conductores=Conductor::all()->lists('nombres', 'id');
        return view('admin.vehiculo.create', ['empresas'=>$empresas, 'conductores'=>$conductores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehiculo= new Vehiculo();
        $vehiculo->placa=$request->placa;
        $vehiculo->numero=$request->numero;
        $vehiculo->marca=$request->marca;
        $vehiculo->linea=$request->linea;
        $vehiculo->modelo=$request->modelo;
        $vehiculo->capacidad=$request->capacidad;
        $vehiculo->tipo_vehiculo=$request->tipo_vehiculo;
        $vehiculo->empresa_transportes_id=$request->empresa_transportes_id;
        $vehiculo->conductor_id=$request->conductor_id;
        //dd($vehiculo);
        $vehiculo->save();
        Flash::success('Se ha agregado el Vehiculo <b>'.$vehiculo->placa.'</b> satisfactoriamente');
        return redirect()->route('admin.vehiculo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo=Vehiculo::find($id);
        $empresas=EmpresaTransporte::all()->lists('nombre', 'id');
        $conductores=Conductor::all()->lists('nombres', 'id');
        //dd($vehiculo);
        return view('admin.vehiculo.view',['vehiculo'=>$vehiculo,'empresas'=>$empresas, 'conductores'=>$conductores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo=Vehiculo::find($id);
        $empresas=EmpresaTransporte::all()->lists('nombre', 'id');
        $conductores=Conductor::all()->lists('nombres', 'id');
        //dd($vehiculo);
        return view('admin.vehiculo.edit',['vehiculo'=>$vehiculo,'empresas'=>$empresas, 'conductores'=>$conductores]);
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
        $vehiculo=Vehiculo::find($id);
        $old_values= Vehiculo::find($id);

        $vehiculo->placa=$request->placa;
        $vehiculo->numero=$request->numero;
        $vehiculo->marca=$request->marca;
        $vehiculo->linea=$request->linea;
        $vehiculo->modelo=$request->modelo;
        $vehiculo->capacidad=$request->capacidad;
        $vehiculo->tipo_vehiculo=$request->tipo_vehiculo;
        $vehiculo->empresa_transportes_id=$request->empresa_transportes_id;
        $vehiculo->conductor_id=$request->conductor_id;

        $new_values= $vehiculo;
        $type=Vehiculo::class;
        LogManager::insertLogUpdate($old_values, $new_values, $type, Auth::user()->name);
        $vehiculo->save();
        Flash::warning('Se ha modificado el vehiculo '.$vehiculo->placa.' satisfactoriamente');
        //dd($vehiculo);
        return redirect()->route('admin.vehiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo=Vehiculo::find($id);
        $placa=$vehiculo->placa;
        $vehiculo->delete();
        Flash::error('el grupo <b>'.$placa.'</b> ha sido eliminado');
        return redirect()->route('admin.vehiculo.index');
    }
}
