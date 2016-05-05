@extends('admin.template.main')
@section('title', 'Lista de Usuarios')
@section('title_section', 'Lista de Usuarios')
@section('content')
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.usuario.create')}}" class="btn btn-success">Registrar Nuevo Usuario</a>
  </div>
</div>
<hr/>
<table class="table">
  <thead>
    <th>Nombre</th>
    <th>Contraseña</th>
    <th>Rol</th>
    <th>Guia</th>
    <th>Opciones</th>
  </thead>
  <tbody>
    @foreach($usuarios as $usuario)
      <tr>
        <td>{{$usuario->nombre}}</td>
        <td>{{$usuario->contrasenia}}</td>
        @if($usuario->rol==1)
          <td>Administrador</td>
        @else
          <td>Guia</td>
        @endif
        <td>{{$usuario->guia_id}}</td>
        <td>
          <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar Usuario??', 'Desea Eliminar el Usuario {{$usuario->nombre}}', '{{route('admin.usuario.destroy',$usuario->id)}}')" />
          <a href="{{route('admin.usuario.show', $usuario->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
          <a href="{{route('admin.usuario.edit',$usuario->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $usuarios->render() !!}
@endsection
