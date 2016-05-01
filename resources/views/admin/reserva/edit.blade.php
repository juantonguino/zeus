@extends('admin.template.main')
@section('title', 'Editar Reserva')
@section('title_section', 'Editar Reserva '.$reserva->nombre)
@section('content')
	{!! Form::open(['route'=>['admin.reserva.update', $reserva->id], 'method'=>'PUT']) !!}
		<div class="row">
    		<div class="form-group col-lg-3">
    			{!! Form::label('lugar', 'Lugar:') !!}
					{!! Form::text('lugar', $reserva->lugar, ['class'=>'form-control', 'placeholder'=>'Lugar de la reserva', 'required']) !!}
    		</div>
    		<div class="form-group col-lg-3">
    			{!! Form::label('valor', 'Valor:') !!}
					{!! Form::number('valor', $reserva->valor, ['class'=>'form-control', 'placeholder'=>'Valor de la reserva', 'required', 'step'=>'0.01']) !!}
    		</div>
    	</div>
		<div class="row">
    		<div class="form-group col-lg-6">
        	{!! Form::label('nombre', 'Nombre:') !!}
					{!! Form::text('nombre', $reserva->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre de la reserva', 'required']) !!}
    		</div>
		</div>
		<div class="row">
    		<div class="form-group col-lg-3">
        	{!! Form::label('fecha', 'Fecha:') !!}
					{!! Form::date('fecha', $reserva->fecha, ['class'=>'form-control', 'required']) !!}
    		</div>
    		<div class="form-group col-lg-3">
        	{!! Form::label('hora', 'Hora:') !!}
					{!! Form::time('hora', $reserva->hora, ['class'=>'form-control', 'required']) !!}
    		</div>
		</div>
		<div class="row">
    		<div class="form-group col-lg-6">
        	{!! Form::label('concepto', 'Concepto:') !!}
					{!! Form::textarea('concepto', $reserva->concepto, ['class'=>'form-control', 'placeholder'=>'Concepto de la reserva', 'required']) !!}
    		</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-3">
				{!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
			</div>
			<div class="form-group col-lg-3">
				<a href="{{route('admin.reserva.index', $reserva->grupo_id)}}" class="btn btn-primary">Regresar</a>
			</div>
		</div>
	{!! Form::close() !!}
@endsection
