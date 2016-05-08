@extends('template.main')
@section('title', 'Inicio')
@section('title_section', 'Iniciar Secion')
@section('content')
  {!! Form::open(['route'=>'verified', 'method'=>'POST']) !!}
  <div class="row">
      <div class="form-group col-lg-3">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del usuario', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
        {!! Form::label('contrasenia', 'Contraseña:') !!}
        {!! Form::password('contrasenia', ['class'=>'form-control', 'placeholder'=>'Contraseña del usuario', 'required']) !!}
      </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-3">
      {!! Form::submit('Iniciar Secion', ['class'=>'btn btn-primary']) !!}
    </div>
  </div>
  {!! Form::close() !!}
@endsection
