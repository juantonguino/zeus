@extends('admin.template.main')
@section('title', 'Lista de Restautantes')
@section('title_section', 'Lista de Restaurantes')
@section('content')
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.restaurante.create')}}" class="btn btn-success">Registrar Nuevo Restaurante</a>
  </div>
</div>
<hr/>
<table class="table">
  <thead>
    <th>Nombre</th>
    <th>Capacidad</th>
    <th>Telefono</th>
    <th>Administrador</th>
    <th>Opciones</th>
  </thead>
  <tbody>
    @foreach($restaurantes as $restaurante)
      <tr>
        <td>{{$restaurante->nombre}}</td>
        <td>{{$restaurante->capacidad}}</td>
        <td>{{$restaurante->telefono}}</td>
        <td>{{$restaurante->administrador}}</td>
        <td>
          <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar Restaurante??', 'Desea Eliminar el Restaurante {{$restaurante->nombre}}', '{{route('admin.restaurante.destroy',$restaurante->id)}}')" />
          <a href="{{route('admin.restaurante.show', $restaurante->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
          <a href="{{route('admin.restaurante.edit',$restaurante->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $restaurantes->render() !!}
@endsection
