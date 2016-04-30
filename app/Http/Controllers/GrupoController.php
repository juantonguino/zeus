<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Laracasts\Flash\Flash;

use App\Grupo;

use Carbon\Carbon;

use PhpOffice\PhpWord\TemplateProcessor;

use \PhpOffice\PhpWord\Autoloader;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos=Grupo::orderBy('fecha_llegada', 'DESC')->paginate(10);
        foreach ($grupos as $grupo) {
            $grupo->hora_llegada=Carbon::parse($grupo->fecha_llegada)->format('H:m');
            $grupo->fecha_llegada=Carbon::parse($grupo->fecha_llegada)->format('Y/m/d');
            $grupo->hora_salida=Carbon::parse($grupo->fecha_salida)->format('H:m');
            $grupo->fecha_salida=Carbon::parse($grupo->fecha_salida)->format('Y/m/d');
        }
        return view('admin.grupo.index')->with('grupos', $grupos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.grupo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo= new Grupo();
        $grupo->nombre = $request->nombre;
        $grupo->estado = $request->estado;
        $grupo->ciudad_origen = $request->ciudad_origen;
        $grupo->fecha_llegada = $request->fecha_llegada." ".$request->hora_llegada;
        $grupo->descripcion_transporte_llegada = $request->descripcion_transporte_llegada;
        $grupo->fecha_salida = $request->fecha_salida." ".$request->hora_salida;
        $grupo->descripcion_transporte_salida = $request->descripcion_transporte_salida;
        $grupo->costo_total_recorrido = $request->costo_total_recorrido;
        $grupo->costo_total_gastado = $request->costo_total_gastado;

        //if($grupo->estado=="1"){
        //    $grupo->estado=true;
        //}
        //else{
        //    $grupo->estado=false;
        //}
        //dd($grupo);

        $grupo->save();

        Flash::success('Se ha agregado el grupo <b>'.$grupo->nombre.'</b> satisfactoriamente');

        return redirect()->route('admin.grupo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo=Grupo::find($id);
        $grupo->hora_llegada=Carbon::parse($grupo->fecha_llegada)->format('H:m');
        $grupo->fecha_llegada=Carbon::parse($grupo->fecha_llegada)->format('Y-m-d');
        $grupo->hora_salida=Carbon::parse($grupo->fecha_salida)->format('H:m');
        $grupo->fecha_salida=Carbon::parse($grupo->fecha_salida)->format('Y-m-d');
        return view('admin.grupo.view')->with('grupo',$grupo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo=Grupo::find($id);
        $grupo->hora_llegada=Carbon::parse($grupo->fecha_llegada)->format('H:m');
        $grupo->fecha_llegada=Carbon::parse($grupo->fecha_llegada)->format('Y-m-d');
        $grupo->hora_salida=Carbon::parse($grupo->fecha_salida)->format('H:m');
        $grupo->fecha_salida=Carbon::parse($grupo->fecha_salida)->format('Y-m-d');

        return view('admin.grupo.edit')->with('grupo',$grupo);
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
        $grupo=Grupo::find($id);
        $grupo->nombre = $request->nombre;
        $grupo->estado = $request->estado;
        $grupo->ciudad_origen = $request->ciudad_origen;
        $grupo->fecha_llegada = $request->fecha_llegada." ".$request->hora_llegada;
        $grupo->descripcion_transporte_llegada = $request->descripcion_transporte_llegada;
        $grupo->fecha_salida = $request->fecha_salida." ".$request->hora_salida;
        $grupo->descripcion_transporte_salida = $request->descripcion_transporte_salida;
        $grupo->costo_total_recorrido = $request->costo_total_recorrido;
        $grupo->costo_total_gastado = $request->costo_total_gastado;

        //if($grupo->estado=="1"){
        //    $grupo->estado=true;
        //}
        //else{
        //    $grupo->estado=false;
        //}

        $grupo->save();
        Flash::warning('Se ha modificado el grupo '.$grupo->nombre.' satisfactoriamente');
        return redirect()->route('admin.grupo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo= Grupo::find($id);
        $nombre=$grupo->nombre;
        $grupo->delete();
        Flash::error('el grupo <b>'.$nombre.'</b> ha sido eliminado');
        return redirect()->route('admin.grupo.index');
    }

    /**
     * Generate Report the specified resource from storage.
     *
     * @param  int  $id
     */
    public function generatereport($id)
    {
        $grupo=Grupo::find($id);
        $nombre = strtoupper ($grupo->nombre);
        Autoloader::register();
        $templateWord = new TemplateProcessor('plantilla_bienvenida.docx');
        $templateWord->setValue('nombre_cliente',$nombre);
        $templateWord->saveAs('$nombre.docx');
        header("Content-Disposition: attachment; filename=".$nombre.".docx; charset=iso-8859-1");
        echo file_get_contents('$nombre.docx');
    }
}
