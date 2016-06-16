@extends('admin.template.main')
@section('title', 'Asignacion')
@section('title_section', 'Asignacion')
@section('content')
<table class="table" border="1">
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
      @foreach($fechas_consultar as $fecha)
        {!! $var=false !!}
        @foreach($grupo->dias as $dia)
          @if($fecha == $dia->fecha)
            <td>{{$dia->destino}}</td>
          @else
            {!! $var=true !!}
          @endif
        @endforeach
        @if($var==true)
          <td>no tiene destino</td>
        @endif
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
