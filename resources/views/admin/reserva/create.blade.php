@extends('admin.template.main')
@section('title', 'Crear Reserva')
@section('title_section', 'Crear Reserva')
@section('content')
	{!! Form::open(['route'=>['admin.reserva.store', $id], 'method'=>'POST']) !!}
		<div class="row">
    		<div class="form-group col-lg-3">
    			{!! Form::label('lugar', 'Lugar:') !!}
					{!! Form::text('lugar', null, ['class'=>'form-control', 'placeholder'=>'Lugar de la reserva', 'required']) !!}
    		</div>
    		<div class="form-group col-lg-3">
    			{!! Form::label('valor', 'Valor:') !!}
					{!! Form::number('valor', null, ['class'=>'form-control', 'placeholder'=>'Valor de la reserva', 'required', 'step'=>'0.01']) !!}
    		</div>
    	</div>
		<div class="row">
    		<div class="form-group col-lg-6">
        	{!! Form::label('nombre', 'Nombre:') !!}
					{!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre de la reserva', 'required']) !!}
    		</div>
		</div>
		<div class="row">
    		<div class="form-group col-lg-3">
        	{!! Form::label('fecha', 'Fecha:') !!}
					{!! Form::date('fecha', null, ['class'=>'form-control', 'required']) !!}
    		</div>
    		<div class="form-group col-lg-3">
        	{!! Form::label('hora', 'Hora:') !!}
					{!! Form::time('hora', null, ['class'=>'form-control', 'required']) !!}
    		</div>
		</div>
		<div class="row">
    		<div class="form-group col-lg-6">
        	{!! Form::label('concepto', 'Concepto:') !!}
					{!! Form::textarea('concepto', null, ['class'=>'form-control', 'placeholder'=>'Concepto de la reserva', 'required']) !!}
    		</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-3">
				{!! Form::submit('Registrar Reserva', ['class'=>'btn btn-success']) !!}
			</div>
			<div class="form-group col-lg-3">
				<a href="{{route('admin.reserva.index', $id)}}" class="btn btn-primary">Regresar</a>
			</div>
		</div>
	{!! Form::close() !!}
@endsection
