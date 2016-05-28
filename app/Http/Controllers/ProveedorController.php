<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Proveedor;

use App\Utilities\LogManager;

use Laracasts\Flash\Flash;

use Auth;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $proveedores= Proveedor::orderBy('nombre', 'ASC')->paginate(10);
      return view('admin.proveedor.index', ['proveedores'=>$proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $proveedor=new proveedor();
      $proveedor->nombre=$request->nombre;
      $proveedor->direccion=$request->direccion;
      $proveedor->telefono=$request->telefono;
      $proveedor->pagina_web=$request->pagina_web;
      $proveedor->save();
      Flash::success('Se ha agregado el proveedor <b>'.$proveedor->nombre.'</b> satisfactoriamente');
      return redirect()->route('admin.proveedor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $proveedor= Proveedor::find($id);
      return view('admin.proveedor.view',['proveedor'=>$proveedor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $proveedor= Proveedor::find($id);
      return view('admin.proveedor.edit',['proveedor'=>$proveedor]);
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
      $proveedor=Proveedor::find($id);
      $old_values=Proveedor::find($id);

      $proveedor->nombre=$request->nombre;
      $proveedor->direccion=$request->direccion;
      $proveedor->telefono=$request->telefono;
      $proveedor->pagina_web=$request->pagina_web;

      $new_values=$proveedor;
      $type=Proveedor::class;
      $proveedor->save();
      LogManager::insertLogUpdate($old_values, $new_values, $type, Auth::user()->name);
      Flash::warning('Se ha modificado el proveedor '.$proveedor->nombre.' satisfactoriamente');
      return redirect()->route('admin.proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $proveedor=Proveedor::find($id);
      $nombre=$proveedor->nombre;
      $proveedor->delete();
      Flash::error('el proveedor <b>'.$nombre.'</b> ha sido eliminado');
      return redirect()->route('admin.proveedor.index');
    }
}
