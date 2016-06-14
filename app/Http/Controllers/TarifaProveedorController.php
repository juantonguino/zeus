<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Proveedor;

use App\TarifaProveedor;

use Laracasts\Flash\Flash;

class TarifaProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($proveedor)
    {
        $proveedorE=Proveedor::find($proveedor);
        $tarifas=TarifaProveedor::where('proveedor_id',$proveedor)->orderBy('id','ASC')->paginate(10);
        return view('admin.tarifaproveedor.index',['proveedor'=>$proveedorE, 'tarifas'=>$tarifas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($proveedor)
    {
        return view('admin.tarifaproveedor.create',['id'=>$proveedor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $proveedor)
    {
        $tarifa= new TarifaProveedor();
        $tarifa->valor=$request->valor;
        $tarifa->concepto=$request->concepto;
        $tarifa->proveedor_id=$proveedor;
        $tarifa->save();
        Flash::success('Se ha agregó la tarifa satisfactoriamente');
        return redirect()->route('admin.tarifaproveedor.index', ['proveedor'=>$proveedor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarifa= TarifaProveedor::find($id);
        return view('admin.tarifaproveedor.view', ['tarifa'=>$tarifa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tarifa= TarifaProveedor::find($id);
      return view('admin.tarifaproveedor.edit', ['tarifa'=>$tarifa]);
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
        $tarifa= TarifaProveedor::find($id);
        $tarifa->valor=$request->valor;
        $tarifa->concepto=$request->concepto;
        $tarifa->save();
        Flash::warning('se ha modificado la tarifa satisfactoriamente');
        return redirect()->route('admin.tarifaproveedor.index', ['id'=>$tarifa->proveedor_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tarifa=TarifaProveedor::find($id);
      $proveedor=$tarifa->proveedor_id;
      $tarifa->delete();
      Flash::error('se ha eliminado la tarifa satisfactoriamente');
      //dd($tarifa);
      return redirect()->route('admin.tarifaproveedor.index',['id'=>$proveedor]);
    }
}
