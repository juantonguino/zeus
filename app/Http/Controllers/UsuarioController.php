<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Guia;

use App\Usuario;

use Laracasts\Flash\Flash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usuarios= Usuario::orderBy('nombre','ASC')->paginate(10);
      foreach ($usuarios as $usuario) {
        $usuario->guia_id=Guia::find($usuario->guia_id)->nombres;
      }
      //dd($usuarios);
      return view('admin.usuario.index',['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $guias= Guia::all();
      $listaguias= array();
      foreach ($guias as $guia) {
        $listaguias["$guia->id"]=$guia->nombres;
      }
      return view('admin.usuario.create', ['listaguias'=>$listaguias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $usuario= new Usuario();
      $usuario->nombre=$request->nombre;
      $usuario->contrasenia=$request->contrasenia;
      $usuario->rol=$request->rol;
      $usuario->guia_id=$request->guia_id;
      $usuario->save();
      Flash::success('Se ha agregado el Usuario <b>'.$usuario->nombre.'</b> satisfactoriamente');
      return redirect()->route('admin.usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario=Usuario::find($id);
        $guias= Guia::all();
        $listaguias= array();
        foreach ($guias as $guia) {
          $listaguias["$guia->id"]=$guia->nombres;
        }
        return view('admin.usuario.view',['usuario'=>$usuario, 'listaguias'=>$listaguias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $usuario=Usuario::find($id);
      $guias= Guia::all();
      $listaguias= array();
      foreach ($guias as $guia) {
        $listaguias["$guia->id"]=$guia->nombres;
      }
      return view('admin.usuario.edit',['usuario'=>$usuario, 'listaguias'=>$listaguias]);
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
      $usuario=Usuario::find($id);
      $usuario->nombre=$request->nombre;
      $usuario->contrasenia=$request->contrasenia;
      $usuario->rol=$request->rol;
      $usuario->guia_id=$request->guia_id;
      $usuario->save();
      Flash::warning('Se ha modificado el usuario <b>'.$usuario->nombre.'</b> satisfactoriamente');
      return redirect()->route('admin.usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $usuario=Usuario::find($id);
      $nombre= $usuario->nombre;
      $usuario->delete();
      Flash::error('el usuario <b>'.$nombre.'</b> ha sido eliminado');
      return redirect()->route('admin.usuario.index');
    }
}
