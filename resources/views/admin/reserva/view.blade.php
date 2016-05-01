@extends('admin.template.main')
@section('title', 'Ver Reserva')
@section('title_section', 'Ver Reserva '.$reserva->nombre)
@section('content')
		<div class="row">
    		<div class="form-group col-lg-3">
    			{!! Form::label('lugar', 'Lugar:') !!}
					{!! Form::text('lugar', $reserva->lugar, ['class'=>'form-control', 'placeholder'=>'Lugar de la reserva', 'required', 'disabled'=>'true']) !!}
    		</div>
    		<div class="form-group col-lg-3">
    			{!! Form::label('valor', 'Valor:') !!}
					{!! Form::number('valor', $reserva->valor, ['class'=>'form-control', 'placeholder'=>'Valor de la reserva', 'required', 'step'=>'0.01', 'disabled'=>'true']) !!}
    		</div>
    	</div>
		<div class="row">
    		<div class="form-group col-lg-6">
        	{!! Form::label('nombre', 'Nombre:') !!}
					{!! Form::text('nombre', $reserva->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre de la reserva', 'required', 'disabled'=>'true']) !!}
    		</div>
		</div>
		<div class="row">
    		<div class="form-group col-lg-3">
        	{!! Form::label('fecha', 'Fecha:') !!}
					{!! Form::date('fecha', $reserva->fecha, ['class'=>'form-control', 'required', 'disabled'=>'true']) !!}
    		</div>
    		<div class="form-group col-lg-3">
        	{!! Form::label('hora', 'Hora:') !!}
					{!! Form::time('hora', $reserva->hora, ['class'=>'form-control', 'required', 'disabled'=>'true']) !!}
    		</div>
		</div>
		<div class="row">
    		<div class="form-group col-lg-6">
        	{!! Form::label('concepto', 'Concepto:') !!}
					{!! Form::textarea('concepto', $reserva->concepto, ['class'=>'form-control', 'placeholder'=>'Concepto de la reserva', 'required', 'disabled'=>'true']) !!}
    		</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-3">
				<a href="{{route('admin.reserva.index', $reserva->grupo_id)}}" class="btn btn-primary">Regresar</a>
			</div>
		</div>
@endsection
