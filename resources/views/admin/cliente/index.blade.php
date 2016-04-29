@extends('admin.template.main')
@section('title', 'Lista de Clientes del Grupo')
@section('title_section', 'Lista de Clientes del Grupo '.$grupo->nombre)
@section('content')
  <div class="row">
    <div class="form-group col-lg-3">
      <a href="{{route('admin.cliente.create', $grupo->id)}}" class="btn btn-success">Registrar Nuevo Cliente</a>
    </div>
    <div class="form-group col-lg-3">
      <a href="{{route('admin.grupo.index')}}" class="btn btn-primary">Regresar</a>
    </div>
  </div>
  <hr/>
  <table class="table">
    <thead>
      <th>Tipo Documento</th>
      <th>Numero Documento</th>
      <th>Nombres</th>
      <th>Telefono</th>
      <th>Fecha Nacimiento</th>
      <th>Opciones</th>
    </thead>
    <tbody>
      @foreach ($clientes as $cliente)
      <tr>
        <td>{{$cliente->tipo_documento}}</td>
        <td>{{$cliente->numero_documento}}</td>
        <td>{{$cliente->nombres}}</td>
        <td>{{$cliente->telefono}}</td>
        <td>{{$cliente->fecha_nacimiento}}</td>
        <td>
          <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Eliminar Cliente', '{{'Desea Eliminar el cliente con nombre '.$cliente->nombres}}', '{{route('admin.cliente.delete', ['id'=>$cliente->id])}}')" />
          <a href="{{route('admin.cliente.view',$cliente->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
          <a href="{{route('admin.cliente.edit',$cliente->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $clientes->render() !!}
@endsection()
