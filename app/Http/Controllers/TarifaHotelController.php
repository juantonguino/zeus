<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TarifaHotel;

use App\Hotel;

use Laracasts\Flash\Flash;

class TarifaHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $hotel= Hotel::find($id);
        $tarifas= TarifaHotel::where('hotel_id',$id)->orderBy('id','ASC')->paginate(10);
        //dd($hotel);
        return view('admin.tarifahotel.index',['hotel'=>$hotel, 'tarifas'=>$tarifas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.tarifahotel.create', ['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $tarifa= new TarifaHotel();
        $tarifa->valor=$request->valor;
        $tarifa->concepto=$request->concepto;
        $tarifa->hotel_id=$id;
        $tarifa->save();
        Flash::success('Se ha agregado la tarifad satisfactoriamente');
        return redirect()->route('admin.tarifahotel.index', ['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarifa= TarifaHotel::find($id);
        return view('admin.tarifahotel.view', ['tarifa'=>$tarifa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tarifa= TarifaHotel::find($id);
      return view('admin.tarifahotel.edit', ['tarifa'=>$tarifa]);
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
        $tarifa=TarifaHotel::find($id);
        $tarifa->valor=$request->valor;
        $tarifa->concepto=$request->concepto;
        Flash::warning('se ha modificado la tarifa satisfactoriamente');
        $tarifa->save();
        return redirect()->route('admin.tarifahotel.index', ['id'=>$tarifa->hotel_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarifa=TarifaHotel::find($id);
        $hotel=$tarifa->hotel_id;
        $tarifa->delete();
        Flash::error('se ha eliminado la tarifa satisfactoriamente');
        //dd($tarifa);
        return redirect()->route('admin.tarifahotel.index',['id'=>$hotel]);
    }
}
