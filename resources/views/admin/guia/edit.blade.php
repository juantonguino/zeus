@extends('admin.template.main')
@section('title', 'Editar Guia')
@section('title_section', 'Editar Guia '.$guia->nombres)
@section('content')
{!! Form::open(['route'=>['admin.guia.update',$guia->id], 'method'=>'PUT']) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('cedula', 'Cedula:') !!}
        {!! Form::number('cedula', $guia->cedula, ['class'=>'form-control', 'placeholder'=>'Cedula del guia', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('nombres', 'Nombres:') !!}
        {!! Form::text('nombres', $guia->nombres, ['class'=>'form-control', 'placeholder'=>'Nombres del guia', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::number('telefono', $guia->telefono, ['class'=>'form-control', 'placeholder'=>'Telefono del guia', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
        {!! Form::date('fecha_nacimiento', $guia->fecha_nacimiento, ['class'=>'form-control', 'placeholder'=>'Fecha de nacimineto del guia', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('email', 'Correo Electronico:') !!}
        {!! Form::email('email', $guia->email, ['class'=>'form-control', 'placeholder'=>'Correo electronico del guia', 'required']) !!}
    </div>
    <!--
    <div class="form-group col-lg-3">
      {!! Form::label('password', 'Contraseña:') !!}
      {!! Form::text('password', null, ['class'=>'form-control', 'placeholder'=>'Nueva contraseña del guia']) !!}
    </div>-->
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('direccion', 'Direccion:') !!}
        {!! Form::textarea('direccion', $guia->direccion, ['class'=>'form-control', 'placeholder'=>'Direccion del guia', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('perfil_academico', 'Perfil Academico:') !!}
        {!! Form::text('perfil_academico', $guia->perfil_academico, ['class'=>'form-control', 'placeholder'=>'Perfil academico del guia', 'required']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    {!! Form::submit('Editar', ['class'=>'btn btn-warning']) !!}
  </div>
  <div class="form-group col-lg-3">
    <a href="{{route('admin.guia.index')}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
{!! Form::close() !!}
@endsection
