@extends('admin.template.main')
@section('title', 'Lista de Proveedores')
@section('title_section', 'Lista de Proveedores')
@section('content')
  <div class="row">
    <div class="form-group col-lg-3">
      <a href="{{route('admin.proveedor.create')}}" class="btn btn-success">Registrar Nuevo Peoveedor</a>
    </div>
  </div>
  <hr/>
  <table class="table">
    <thead>
      <th>Nombre</th>
      <th>Telefono</th>
      <th>Pagina Web</th>
      <th>Opciones</th>
    </thead>
    <tbody>
      @foreach($proveedores as $proveedor)
      <tr>
        <td>{{$proveedor->nombre}}</td>
        <td>{{$proveedor->telefono}}</td>
        <td><a href="{{$proveedor->pagina_web}}">{{$proveedor->pagina_web}}</a></td>
        <td>
          <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar Proveedor??', 'Desea Eliminar el proveedor {{$proveedor->nombre}}', '{{route('admin.proveedor.destroy',$proveedor->id)}}')" />
          <a href="{{route('admin.proveedor.show', $proveedor->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
          <a href="{{route('admin.proveedor.edit', $proveedor->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
          <a href="{{route('admin.tarifaproveedor.index', $proveedor->id)}}" class="btn btn-primary glyphicon glyphicon-briefcase" title="Ver Tarfas"/>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $proveedores->render() !!}
@endsection
