@extends('admin.template.main')
@section('title', 'Lista de Guias')
@section('title_section', 'Lista de Guias')
@section('content')
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.guia.create')}}" class="btn btn-success">Registrar Nuevo Guia</a>
  </div>
</div>
<hr/>
<table class="table">
  <thead>
    <th>cedula</th>
    <th>Nombres</th>
    <th>Telefono</th>
    <th>Correo Electronico</th>
    <th>Opciones</th>
  </thead>
  <tbody>
    @foreach($guias as $guia)
      <tr>
        <td>{{$guia->cedula}}</td>
        <td>{{$guia->nombres}}</td>
        <td>{{$guia->telefono}}</td>
        <td>{{$guia->correo_electronico}}</td>
        <td>
          <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar Guia??', 'Desea Eliminar el guia {{$guia->nombres}}', '{{route('admin.guia.destroy',$guia->id)}}')" />
          <a href="{{route('admin.guia.show', $guia->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
          <a href="{{route('admin.guia.edit', $guia->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $guias->render() !!}
@endsection
