<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Restaurante;

use App\TarifaRestaurante;

use Laracasts\Flash\Flash;

class TarifaRestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $restaurante=Restaurante::find($id);
        $tarifas=TarifaRestaurante::where('restaurante_id',$id)->orderBy('id','ASC')->paginate(10);
        //dd($restaurante);
        return view('admin.tarifarestaurante.index',['restaurante'=>$restaurante, 'tarifas'=>$tarifas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dd($id);
        return view('admin.tarifarestaurante.create',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $tarifa= new TarifaRestaurante();
        $tarifa->concepto=$request->concepto;
        $tarifa->valor=$request->valor;
        $tarifa->restaurante_id=$id;
        $tarifa->save();
        Flash::success('Se ha agregó la tarifa satisfactoriamente');
        return redirect()->route('admin.tarifarestaurante.index', ['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarifa= TarifaRestaurante::find($id);
        //dd($tarifa);
        return view('admin.tarifarestaurante.view',['tarifa'=>$tarifa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarifa= TarifaRestaurante::find($id);
        //dd($tarifa);
        return view('admin.tarifarestaurante.edit',['tarifa'=>$tarifa]);
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
        $tarifa= TarifaRestaurante::find($id);
        $tarifa->concepto=$request->concepto;
        $tarifa->valor=$request->valor;
        //dd($tarifa);
        $tarifa->save();
        Flash::warning('se ha modificado la tarifa satisfactoriamente');
        return redirect()->route('admin.tarifarestaurante.index', ['id'=>$tarifa->restaurante_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tarifa=TarifaRestaurante::find($id);
      $restaurante=$tarifa->restaurante_id;
      $tarifa->delete();
      Flash::error('se ha eliminado la tarifa satisfactoriamente');
      //dd($tarifa);
      return redirect()->route('admin.tarifarestaurante.index',['id'=>$restaurante]);
    }
}
