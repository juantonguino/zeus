@extends('admin.template.main')
@section('title', 'Lista de Empresas')
@section('title_section', 'Lista de Empresas de Transporte')
@section('content')
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.empresas.create')}}" class="btn btn-success">Registrar Nueva Empresa</a>
  </div>
</div>
<hr/>
<table class="table">
  <thead>
    <th>Nombre</th>
    <th>telefono</th>
    <th>direccion</th>
    <th>Opciones</th>
  </thead>
  <tbody>
    @foreach($empresas as $empresa)
      <tr>
        <td>{{$empresa->nombre}}</td>
        <td>{{$empresa->telefono}}</td>
        <td>{{$empresa->direccion}}</td>
        <td>
          <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar La Empresa??', 'Desea Eliminar la Empresa {{$empresa->nombre}}', '{{route('admin.empresas.destroy',$empresa->id)}}')" />
          <a href="{{route('admin.empresas.show', $empresa->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
          <a href="{{route('admin.empresas.edit',$empresa->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $empresas->render() !!}
@endsection
