@extends('admin.template.main')
@section('title', 'Asignacion')
@section('title_section', 'Asignacion')
@section('content')
{!! Form::open(['route'=>['admin.asignar.guardar'], 'method'=>'POST']) !!}
<table class="table" border="1" id="tabla">
  <thead>
    <tr>
      <th colspan="2" class="center-col-table">Grupo</th>
      <th colspan="{{sizeof($fechas_mostrar)}}" class="center-col-table">Fecha</th>
    </tr>
    <tr>
      <th>Nombre</th>
      <th>N° Pax</th>
      @foreach($fechas_mostrar as $fecha)
        <th>{{$fecha}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach($grupos as $grupo)
    <tr>
      <td>{{$grupo->nombre}}</td>
      <td>{{sizeof($grupo->clientes)}}</td>
      <?php $buscado=null; ?>
      @foreach($fechas_consultar as $fecha)
        @foreach($grupo->dias as $dia)
          @if($fecha == $dia->fecha)
            <?php $buscado=$dia;?>
            @break
          @endif
        @endforeach
        @if($buscado!=null)
          <td><b>{{$buscado->destino}}</b></br>
            {!! Form::label('guia_id_dia'.$buscado->id, 'Guia') !!}<br>
            {!! Form::select('guia_id_dia'.$buscado->id, $guias, $select_guia[$buscado->id], ['class'=>'form-control tagPicker', 'multiple'=>'multiple']) !!}<br>
            {!! Form::label('transporte_id_dia'.$buscado->id, 'Transporte') !!}<br>
            {!! Form::select('transporte_id_dia'.$buscado->id, $transportes, $select_vehiculo[$buscado->id], ['class'=>'form-control tagPicker', 'multiple'=>'multiple']) !!}<br>
          </td>
          <?php $buscado=null; ?>
        @else
          <td></td>
        @endif
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
  <div class="form-group col-lg-3">
    {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
{!! Form::close() !!}
@endsection
