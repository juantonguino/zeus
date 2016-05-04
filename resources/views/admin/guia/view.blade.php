@extends('admin.template.main')
@section('title', 'Ver Guia')
@section('title_section', 'Ver Guia '.$guia->nombres)
@section('content')
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('cedula', 'Cedula:') !!}
        {!! Form::number('cedula', $guia->cedula, ['class'=>'form-control', 'placeholder'=>'Cedula del guia', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('nombres', 'Nombres:') !!}
        {!! Form::text('nombres', $guia->nombres, ['class'=>'form-control', 'placeholder'=>'Nombres del guia', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::number('telefono', $guia->telefono, ['class'=>'form-control', 'placeholder'=>'Telefono del guia', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
        {!! Form::date('fecha_nacimiento', $guia->fecha_nacimiento, ['class'=>'form-control', 'placeholder'=>'Fecha de nacimineto del guia', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('correo_electronico', 'Correo Electronico:') !!}
        {!! Form::email('correo_electronico', $guia->correo_electronico, ['class'=>'form-control', 'placeholder'=>'Correo electronico del guia', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('direccion', 'Direccion:') !!}
        {!! Form::textarea('direccion', $guia->direccion, ['class'=>'form-control', 'placeholder'=>'Direccion del guia', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('perfil_academico', 'Perfil Academico:') !!}
        {!! Form::text('perfil_academico', $guia->perfil_academico, ['class'=>'form-control', 'placeholder'=>'Perfil academico del guia', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.guia.index')}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
@endsection
