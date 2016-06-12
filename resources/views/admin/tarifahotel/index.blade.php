@extends('admin.template.main')
@section('title', 'Lista de Tarifas')
@section('title_section', 'Lista de Tarifas del Hotel '.$hotel->nombre)
@section('content')
<div class="row">
    <div class="form-group col-lg-3">
      <a href="{{route('admin.tarifahotel.create', $hotel->id)}}" class="btn btn-success">Registrar Nueva Tarifa</a>
    </div>
    <div class="form-group col-lg-3">
      <a href="{{route('admin.hotel.index')}}" class="btn btn-primary">Regresar</a>
    </div>
</div>
<hr/>
<table class="table">
  <thead>
    <th>Valor</th>
    <th>Concepto</th>
    <th>Opciones</th>
  </thead>
  <tbody>
    @foreach($tarifas as $tarifa)
      <tr>
        <td>{{$tarifa->valor}}</td>
        <td>{{$tarifa->concepto}}</td>
        <td>
          <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar Tarifa??', 'Desea Eliminar la Tarifa {{$tarifa->concepto}}', '{{route('admin.tarifahotel.destroy',$tarifa->id)}}')" />
          <a href="{{route('admin.tarifahotel.show', $tarifa->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
          <a href="{{route('admin.tarifahotel.edit', $tarifa->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $tarifas->render() !!}
@endsection
