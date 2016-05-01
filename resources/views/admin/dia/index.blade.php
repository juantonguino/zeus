@extends('admin.template.main')
@section('title', 'Lista de Dias')
@section('title_section', 'Lista de Dias del Grupo '.$grupo->nombre)
@section('content')
  <div class="row">
    <div class="form-group col-lg-3">
      <a href="{{route('admin.dia.create', $grupo->id)}}" class="btn btn-success">Registrar Nuevo Dia</a>
    </div>
    <div class="form-group col-lg-3">
      <a href="{{route('admin.grupo.index')}}" class="btn btn-primary">Regresar</a>
    </div>
  </div>
  <hr/>
  <table class="table">
    <thead>
      <th>Destino</th>
      <th>Fecha</th>
      <th>Total Gastado</th>
      <th>Dinero Asignado</th>
      <th>Hotel</th>
      <th>Opciones</th>
    </thead>
    <tbody>
      @foreach($dias as $dia)
        <tr>
          <td>{{$dia->destino}}</td>
          <td>{{$dia->fecha}}</td>
          <td>{{$dia->total_gastado}}</td>
          <td>{{$dia->dinero_asignado}}</td>
          <td>{{$dia->hotel_id}}</td>
          <td>
            <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar Dia??', 'Desea Eliminar el Dia {{$dia->fecha}}', '{{route('admin.dia.destroy',$dia->id)}}')" />
						<a href="{{route('admin.dia.show', $dia->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
						<a href="{{route('admin.dia.edit',$dia->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection()
