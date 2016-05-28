<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Laracasts\Flash\Flash;

use App\Restaurante;

use Auth;

use App\Utilities\LogManager;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $restaurantes=Restaurante::orderBy('nombre', 'DESC')->paginate(10);
      return view('admin.restaurante.index',['restaurantes'=>$restaurantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $restaurante= new Restaurante();
      $restaurante->nombre=$request->nombre;
      $restaurante->capacidad=$request->capacidad;
      $restaurante->telefono=$request->telefono;
      $restaurante->direccion=$request->direccion;
      $restaurante->administrador=$request->administrador;
      $restaurante->save();
      Flash::success('Se ha agregado el restaurante <b>'.$restaurante->nombre.'</b> satisfactoriamente');
      return redirect()->route('admin.restaurante.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $restaurante= Restaurante::find($id);
      //dd($restaurante);
      return view('admin.restaurante.view', ['restaurante'=>$restaurante]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $restaurante= Restaurante::find($id);
      return view('admin.restaurante.edit',['restaurante'=>$restaurante]);
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
      $restaurante=Restaurante::find($id);
      $old_values=Restaurante::find($id);

      $restaurante->nombre=$request->nombre;
      $restaurante->capacidad=$request->capacidad;
      $restaurante->telefono=$request->telefono;
      $restaurante->direccion=$request->direccion;
      $restaurante->administrador=$request->administrador;

      $new_values=$restaurante;
      $type=Restaurante::class;
      $restaurante->save();
      LogManager::insertLogUpdate($old_values, $new_values, $type, Auth::user()->name);
      Flash::warning('Se ha modificado el restaurante <b>'.$restaurante->nombre.'</b> satisfactoriamente');
      return redirect()->route('admin.restaurante.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $restaurante=Restaurante::find($id);
      $nombre= $restaurante->nombre;
      $restaurante->delete();
      Flash::error('el restaurante <b>'.$nombre.'</b> ha sido eliminado');
      return redirect()->route('admin.restaurante.index');
    }
}
