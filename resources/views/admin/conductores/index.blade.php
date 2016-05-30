@extends('admin.template.main')
@section('title', 'Lista de Conductores')
@section('title_section', 'Lista de Conductores')
@section('content')
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.conductores.create')}}" class="btn btn-success">Registrar Nuevo Conductor</a>
  </div>
</div>
<hr/>
<table class="table">
  <thead>
    <th>cedula</th>
    <th>Nombres</th>
    <th>Email</th>
    <th>Opciones</th>
  </thead>
  <tbody>
    @foreach($conductores as $conductor)
      <tr>
        <td>{{$conductor->cedula}}</td>
        <td>{{$conductor->nombres}}</td>
        <td>{{$conductor->correo_electronico}}</td>
        <td>
          <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar el Conductor??', 'Desea Eliminar el Conductor {{$conductor->nombres}}', '{{route('admin.conductores.destroy',$conductor->id)}}')" />
          <a href="{{route('admin.conductores.show', $conductor->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
          <a href="{{route('admin.conductores.edit',$conductor->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $conductores->render() !!}
@endsection()
