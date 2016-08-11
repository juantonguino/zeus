@extends('admin.template.main')
@section('title', 'Crear Grupo')
@section('title_section', 'Crear Grupo')
@section('content')
	{!! Form::open(['route'=>'admin.grupo.store', 'method'=>'POST']) !!}
		<div class="row">
			<div class="form-group col-lg-6">
					{!!Form::label('plan', 'Plan:')!!}
					{!!Form::text('plan', null, ['class'=>'form-control', 'placeholder'=>'Plan del grupo'])!!}
			</div>
		</div>
		<div class="row">
    		<div class="form-group col-lg-6">
        		{!! Form::label('nombre', 'Nombre:') !!}
						{!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del grupo', 'required']) !!}
    		</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				{!! Form::label('estado', 'Estado:') !!}
				{!! Form::select('estado', [1=>'Activo', 0=>'Inactivo'], null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				{!! Form::label('ciudad_origen', 'Ciudad de Origen:') !!}
				{!! Form::text('ciudad_origen', null, ['class'=>'form-control', 'placeholder'=>'Ciudad de origen del grupo', 'required']) !!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-3">
				{!! Form::label('fecha_llegada', 'Fecha de LLegada:') !!}
				{!! Form::date('fecha_llegada', null, ['class'=>'form-control', 'required']) !!}
			</div>
			<div class="form-group col-lg-3">
				{!! Form::label('hora_llegada', 'Hora de LLegada:') !!}
				{!! Form::time('hora_llegada', null, ['class'=>'form-control', 'required']) !!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				{!! Form::label('descripcion_transporte_llegada', 'Descripcion Transporte de LLegada:') !!}
				{!! Form::textarea('descripcion_transporte_llegada', null, ['class'=>'form-control', 'required', 'placeholder'=>'Descripcion Transporte de LLegada',]) !!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-3">
				{!! Form::label('fecha_salida', 'Fecha de Salida:') !!}
				{!! Form::date('fecha_salida', null, ['class'=>'form-control', 'required']) !!}
			</div>
			<div class="form-group col-lg-3">
				{!! Form::label('hora_salida', 'Hora de Salida:') !!}
				{!! Form::time('hora_salida', null, ['class'=>'form-control', 'required']) !!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				{!! Form::label('descripcion_transporte_salida', 'Descripcion Transporte de Salida:') !!}
				{!! Form::textarea('descripcion_transporte_salida', null, ['class'=>'form-control', 'required', 'placeholder'=>'Descripcion Transporte de Salida']) !!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-3">
				{!! Form::label('costo_total_recorrido', 'Costo Total Recorrido:') !!}
				{!! Form::number('costo_total_recorrido', null, ['class'=>'form-control', 'placeholder'=>'Costo Total del Recorrido', 'step'=>'0.01']) !!}
			</div>
			<div class="form-group col-lg-3">
				{!! Form::label('costo_total_gastado', 'Costo Total Gastado:') !!}
				{!! Form::number('costo_total_gastado', null, ['class'=>'form-control', 'placeholder'=>'Costo Total Gastado', 'step'=>'0.01']) !!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-3">
				{!! Form::submit('Registrar Grupo', ['class'=>'btn btn-success']) !!}
			</div>
			<div class="form-group col-lg-3">
				<a href="{{route('admin.grupo.index')}}" class="btn btn-primary">Regresar</a>
			</div>
		</div>
	{!! Form::close() !!}
@endsection
