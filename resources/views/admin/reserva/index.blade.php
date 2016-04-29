@extends('admin.template.main')
@section('title', 'Lista de Reservas del Grupo')
@section('title_section', 'Lista de Reservas del Grupo '.$grupo->nombre)
@section('content')
	<div class="row">
		<div class="form-group col-lg-3">
			<a href="{{route('admin.reserva.create', $grupo->id)}}" class="btn btn-success">Registrar Nueva Reserva</a>
		</div>
		<div class="form-group col-lg-3">
			<a href="{{route('admin.grupo.index')}}" class="btn btn-primary">Regresar</a>
		</div>
	</div>
	<hr/>
	<table class="table">
		<thead>
			<th>Lugar</th>
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Valor</th>
			<th>Opciones</th>
		</thead>
		<tbody>
			@foreach($reservas as $reserva)
				<tr>
					<td>{{$reserva->lugar}}</td>
					<td>{{$reserva->nombre}}</td>
					<td>{{$reserva->fecha}}</td>
					<td>{{$reserva->hora}}</td>
					<td>{{$reserva->valor}}</td>
					<td>
						<a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Eliminar Reserva', 'Desea Eliminar la Reserva a nombre de {{$reserva->nombre}} en {{$reserva->lugar}}', '{{route('admin.reserva.delete', ['id'=>$reserva->id])}}')" />
						<a href="{{route('admin.reserva.view',$reserva->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
						<a href="{{route('admin.reserva.edit',$reserva->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $reservas->render() !!}
@endsection
