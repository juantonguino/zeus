<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hotel;

use App\Utilities\LogManager;

use Laracasts\Flash\Flash;

use App\Http\Requests;

use Auth;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $hoteles= Hotel::orderBy('nombre', 'ASC')->paginate(10);
      //return view('admin.hotel.index')->with('hoteles',$hoteles);
      return view('admin.hotel.index',['hoteles'=>$hoteles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $hotel= new Hotel();
      $hotel->nombre=$request->nombre;
      $hotel->telefono=$request->telefono;
      $hotel->capacidad=$request->capacidad;
      $hotel->administrador=$request->administrador;
      $hotel->direccion=$request->direccion;
      $hotel->correo_electronico=$request->correo_electronico;
      $hotel->pagina_web=$request->pagina_web;
      $hotel->save();
      Flash::success('Se ha agregado el hotel <b>'.$hotel->nombre.'</b> satisfactoriamente');
      //dd($hotel);
      return redirect()->route('admin.hotel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel=Hotel::find($id);
        //dd($hotel);
        return view('admin.hotel.view', ['hotel'=>$hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel= Hotel::find($id);
        return view('admin.hotel.edit', ['hotel'=>$hotel]);
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
      $hotel= Hotel::find($id);
      $old_values=Hotel::find($id);

      $hotel->nombre=$request->nombre;
      $hotel->telefono=$request->telefono;
      $hotel->capacidad=$request->capacidad;
      $hotel->administrador=$request->administrador;
      $hotel->direccion=$request->direccion;
      $hotel->correo_electronico=$request->correo_electronico;
      $hotel->pagina_web=$request->pagina_web;

      $new_values=$hotel;
      $type=Hotel::class;
      //dd($hotel);
      $hotel->save();
      LogManager::insertLogUpdate($old_values, $new_values, $type, Auth::user()->name);
      Flash::warning('Se ha modificado el hotel '.$hotel->nombre.' satisfactoriamente');
      return redirect()->route('admin.hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel=Hotel::find($id);
        $nombre= $hotel->nombre;
        $hotel->delete();
        Flash::error('el hotel <b>'.$nombre.'</b> ha sido eliminado');
        return redirect()->route('admin.hotel.index');
    }
}
