<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Guia;

use App\User;

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
      $usuarios= User::orderBy('name','ASC')->paginate(10);
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
      return view('admin.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $usuario= new User();
      $usuario->name=$request->name;
      $usuario->email=$request->email;
      $usuario->password=bcrypt($request->password);
      //dd($usuario);
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
        $usuario=User::find($id);
        return view('admin.usuario.view',['usuario'=>$usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $usuario=User::find($id);
      return view('admin.usuario.edit',['usuario'=>$usuario]);
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
      $usuario=User::find($id);
      $usuario->name=$request->name;
      $usuario->email=$request->email;
      if($usuario->password!=""){
          $usuario->password=bcrypt($request->password);
      }
      //dd($usuario);
      $usuario->save();
      Flash::warning('Se ha modificado el usuario <b>'.$usuario->name.'</b> satisfactoriamente');
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
      $usuario=User::find($id);
      $nombre= $usuario->name;
      //dd($usuario);
      $usuario->delete();
      Flash::error('el usuario <b>'.$nombre.'</b> ha sido eliminado');
      return redirect()->route('admin.usuario.index');
    }
}
