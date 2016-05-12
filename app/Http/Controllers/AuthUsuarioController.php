<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Usuario;

use Laracasts\Flash\Flash;

use Auth;

class AuthUsuarioController extends Controller
{
    public function index()
    {
      return view('index');
    }

    public function authenticate(Request $request)
    {
      $usuario=Usuario::where('nombre',$request->nombre)->first();
      if($usuario!=null && $usuario->contrasenia==$request->contrasenia){
        if ($usuario->rol==1) {
          Auth::login($usuario);
          return redirect('admin');
        }
      }
      else {
        Flash::error('Upss Usuario o Contraseña invalidos');
        return view('index');
      }
    }
}
