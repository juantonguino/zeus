@extends('admin.template.main')
@section('title', 'Crear Hotel')
@section('title_section', 'Crear Hotel')
@section('content')
  {!! Form::open(['route'=>'admin.hotel.store', 'method'=>'POST']) !!}
    <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('nombre', 'Nombre:') !!}
          {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del hotel', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('capacidad', 'Capacidad:') !!}
          {!! Form::number('capacidad', null, ['class'=>'form-control', 'placeholder'=>'Capacidad del hotel', 'required']) !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('administrador', 'Administrador:') !!}
          {!! Form::text('administrador', null, ['class'=>'form-control', 'placeholder'=>'Administrador del hotel', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('telefono', 'Telefono:') !!}
          {!! Form::number('telefono', null, ['class'=>'form-control', 'placeholder'=>'Telefono del hotel', 'required']) !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('direccion', 'Direccion:') !!}
          {!! Form::textarea('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion del hotel', 'required']) !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('correo_electronico', 'Correo Electronico:') !!}
          {!! Form::email('correo_electronico', null, ['class'=>'form-control', 'placeholder'=>'Correo Electronico del hotel', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('pagina_web', 'Pagina Web:') !!}
          {!! Form::text('pagina_web', null, ['class'=>'form-control', 'placeholder'=>'Pagina web del hotel', 'required']) !!}
      </div>
    </div>
    <div class="row">
			<div class="form-group col-lg-3">
				{!! Form::submit('Registrar Hotel', ['class'=>'btn btn-success']) !!}
			</div>
			<div class="form-group col-lg-3">
				<a href="{{route('admin.hotel.index')}}" class="btn btn-primary">Regresar</a>
			</div>
		</div>
  {!! Form::close() !!}
@endsection()
