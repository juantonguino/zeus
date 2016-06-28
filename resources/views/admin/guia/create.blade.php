@extends('admin.template.main')
@section('title', 'Crear Guia')
@section('title_section', 'Crear Guia')
@section('content')
{!! Form::open(['route'=>'admin.guia.store', 'method'=>'POST']) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('cedula', 'Cedula:') !!}
        {!! Form::number('cedula', null, ['class'=>'form-control', 'placeholder'=>'Cedula del guia', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('nombres', 'Nombres:') !!}
        {!! Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Nombres del guia', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::number('telefono', null, ['class'=>'form-control', 'placeholder'=>'Telefono del guia', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
        {!! Form::date('fecha_nacimiento', null, ['class'=>'form-control', 'placeholder'=>'Fecha de nacimineto del guia', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('email', 'Correo Electronico:') !!}
        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Correo electronico del guia', 'required']) !!}
    </div>
    <!--
    <div class="form-group col-lg-3">
      {!! Form::label('password', 'Contraseña:') !!}
      {!! Form::text('password', null, ['class'=>'form-control', 'placeholder'=>'Contraseña del guia', 'required']) !!}
    </div>-->
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('direccion', 'Direccion:') !!}
        {!! Form::textarea('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion del guia', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('perfil_academico', 'Perfil Academico:') !!}
        {!! Form::text('perfil_academico', null, ['class'=>'form-control', 'placeholder'=>'Perfil academico del guia', 'required']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    {!! Form::submit('Registrar Guia', ['class'=>'btn btn-success']) !!}
  </div>
  <div class="form-group col-lg-3">
    <a href="{{route('admin.guia.index')}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
{!! Form::close() !!}
@endsection
