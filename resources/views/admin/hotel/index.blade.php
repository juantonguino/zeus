@extends('admin.template.main')
@section('title', 'Lista de Hoteles')
@section('title_section', 'Lista de Hoteles')
@section('content')
  <div class="row">
    <div class="form-group col-lg-3">
      <a href="{{route('admin.hotel.create')}}" class="btn btn-success">Registrar Nuevo Hotel</a>
    </div>
  </div>
  <hr/>
  <table class="table">
    <thead>
      <th>Nombre</th>
      <th>Telefono</th>
      <th>Direccion</th>
      <th>Correo Electronico</th>
      <th>Pagina Web</th>
      <th>Opciones</th>
    </thead>
    <tbody>
      @foreach ($hoteles as $hotel)
        <tr>
          <td>{{$hotel->nombre}}</td>
          <td>{{$hotel->telefono}}</td>
          <td>{{$hotel->direccion}}</td>
          <td>{{$hotel->correo_electronico}}</td>
          <td><a href="{{$hotel->pagina_web}}">{{$hotel->pagina_web}}</a></td>
          <td>
            <a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar Hotel??', 'Desea Eliminar el hotel {{$hotel->nombre}}', '{{route('admin.hotel.destroy',$hotel->id)}}')" />
						<a href="{{route('admin.hotel.show', $hotel->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
						<a href="{{route('admin.hotel.edit', $hotel->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {!! $hoteles->render() !!}
@endsection()
