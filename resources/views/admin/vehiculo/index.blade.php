@extends('admin.template.main')
@section('title', 'Lista de Vehiculos')
@section('title_section', 'Lista de Vehiculos')
@section('content')
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.vehiculo.create')}}" class="btn btn-success">Registrar Nuevo Vehiculo</a>
  </div>
</div>
<hr/>
<table class="table">
  <thead>
    <th>Placa</th>
    <th>Numero</th>
    <th>Linea</th>
    <th>Modelo</th>
    <th>Capacidad</th>
    <th>Tipo Vehiculo</th>
    <th>Empresa de Transportes</th>
    <th>Conductor</th>
    <th>Opciones</th>
  </thead>
  <tbody>
    @foreach($vehiculos as $vehiculo)
      <tr>
        <td>{{$vehiculo->placa}}</td>
        <td>{{$vehiculo->numero}}</td>
        <td>{{$vehiculo->linea}}</td>
        <td>{{$vehiculo->modelo}}</td>
        <td>{{$vehiculo->capacidad}}</td>
        <td>{{$vehiculo->tipo_vehiculo}}</td>
        <td>{{$vehiculo->empresa}}</td>
        <td>{{$vehiculo->conductor}}</td>
        <td>
          <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar Vehiculo??', 'Desea Eliminar el Vehiclo {{$vehiculo->placa}}', '{{route('admin.vehiculo.destroy',$vehiculo->id)}}')" />
          <a href="{{route('admin.vehiculo.show', $vehiculo->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
          <a href="{{route('admin.vehiculo.edit', $vehiculo->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $vehiculos->render() !!}
@endsection
