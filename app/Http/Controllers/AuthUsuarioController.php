<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Usuario;

use Auth;

class AuthUsuarioController extends Controller
{
    public function index()
    {
      return view('index');
    }

    public function authenticate(Request $request)
    {
      $res=Usuario::orderBy('nombre','asc')->paginate(10);
      dd($res);
    }
}
