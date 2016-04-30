@extends('admin.template.main')
@section('title', 'Crear Hotel')
@section('title_section', 'Ver Hotel '.$hotel->nombre)
@section('content')
  <div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', $hotel->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre del hotel', 'required', 'disabled']) !!}
    </div>
    <div class="form-group col-lg-3">
        {!! Form::label('capacidad', 'Capacidad:') !!}
        {!! Form::number('capacidad', $hotel->capacidad, ['class'=>'form-control', 'placeholder'=>'Capacidad del hotel', 'required', 'disabled']) !!}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('administrador', 'Administrador:') !!}
        {!! Form::text('administrador', $hotel->administrador, ['class'=>'form-control', 'placeholder'=>'Administrador del hotel', 'required', 'disabled']) !!}
    </div>
    <div class="form-group col-lg-3">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::number('telefono', $hotel->telefono, ['class'=>'form-control', 'placeholder'=>'Telefono del hotel', 'required', 'disabled', 'disabled']) !!}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('direccion', 'Direccion:') !!}
        {!! Form::textarea('direccion', $hotel->direccion, ['class'=>'form-control', 'placeholder'=>'Direccion del hotel', 'required', 'disabled']) !!}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('correo_electronico', 'Correo Electronico:') !!}
        {!! Form::email('correo_electronico', $hotel->correo_electronico, ['class'=>'form-control', 'placeholder'=>'Correo Electronico del hotel', 'required', 'disabled']) !!}
    </div>
    <div class="form-group col-lg-3">
        {!! Form::label('pagina_web', 'Pagina Web:') !!}
        {!! Form::text('pagina_web', $hotel->pagina_web, ['class'=>'form-control', 'placeholder'=>'Pagina web del hotel', 'required', 'disabled']) !!}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-3">
      <a href="{{route('admin.hotel.index')}}" class="btn btn-primary">Regresar</a>
    </div>
  </div>
@endsection
