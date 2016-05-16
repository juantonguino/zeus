@extends('admin.template.main')
@section('title', 'Lista de Grupos')
@section('title_section', 'Lista de Grupos')
@section('content')
	<div class="row">
		<div class="form-group col-lg-3">
			<a href="{{route('admin.grupo.create')}}" class="btn btn-success">Registrar Nuevo Grupo</a>
		</div>
	</div>
	<hr/>
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Estado</th>
			<th>Fecha de LLegada</th>
			<th>Hora de LLegada</th>
			<th>Fecha de Salida</th>
			<th>Hora de Salida</th>
			<th>Costo Total Recorrido</th>
			<th>Opciones</th>
		</thead>
		<tbody>
			@foreach($grupos as $grupo)
				<tr>
					<td>{{$grupo->nombre}}</td>
					@if($grupo->estado==1)
						<td>{{'Activo'}}</td>
					@else
						<td>{{'Inactivo'}}</td>
					@endif
					<td>{{$grupo->fecha_llegada}}</td>
					<td>{{$grupo->hora_llegada}}</td>
					<td>{{$grupo->fecha_salida}}</td>
					<td>{{$grupo->hora_salida}}</td>
					<td>{{$grupo->costo_total_recorrido}}</td>
					<td>
						<a href="#" class="btn btn-danger glyphicon glyphicon-trash" title="Eiminar" onclick="confirmDelete('Desea Eliminar Grupo??', 'Desea Eliminar el Grupo {{$grupo->nombre}}', '{{route('admin.grupo.destroy',$grupo->id)}}')" />
						<a href="{{route('admin.grupo.show', $grupo->id)}}" class="btn btn-primary glyphicon glyphicon-search" title="Ver"/>
						<a href="{{route('admin.grupo.edit',$grupo->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" title="Editar"/>
						<a href="{{route('admin.cliente.index',$grupo->id)}}" class="btn btn-primary glyphicon glyphicon-user" title="Clientes"/>
						<a href="{{route('admin.reserva.index', $grupo->id)}}" class="btn btn-primary glyphicon glyphicon-flag" title="Reserva"/>
						<a href="{{route('admin.dia.index', $grupo->id)}}" class="btn btn-primary glyphicon glyphicon glyphicon-cloud" title="Dia"/>
						<a href="{{route('admin.grupo.report',$grupo->id)}}" class="btn btn-primary glyphicon glyphicon glyphicon-print" title="Generar Reporte Bienvenida"/>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $grupos->render() !!}
@endsection
