@extends('admin.template.main')
@section('title', 'Ver Conductor')
@section('title_section', 'Conductor '.$conductor->nombres)
@section('content')
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('cedula', 'Cedula:') !!}
            {!! Form::number('cedula', $conductor->cedula, ['class'=>'form-control', 'placeholder'=>'Numero de Cedula del Conductor', 'required','disabled']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('nombres', 'Nombre Completo:') !!}
            {!! Form::text('nombres', $conductor->nombres, ['class'=>'form-control', 'placeholder'=>'Nombre completo del Conductor', 'required','disabled']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('telefono', 'Telefono:') !!}
            {!! Form::number('telefono', $conductor->telefono, ['class'=>'form-control', 'placeholder'=>'Telefono del Conductor', 'required','disabled']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
            {!! Form::date('fecha_nacimiento', $conductor->fecha_nacimiento, ['class'=>'form-control', 'placeholder'=>'Fecha de Nacimiento del Conductor','disabled']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('direccion', 'Direccion:') !!}
            {!! Form::text('direccion', $conductor->direccion, ['class'=>'form-control', 'placeholder'=>'Direccion del Conductor','disabled']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('correo_electronico', 'Correo:') !!}
            {!! Form::email('correo_electronico', $conductor->correo_electronico, ['class'=>'form-control', 'placeholder'=>'Correo Electronico del Conductor','disabled']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('perfil_academico', 'Perfil Academico:') !!}
            {!! Form::text('perfil_academico', $conductor->perfil_academico, ['class'=>'form-control', 'placeholder'=>'Perfil Academico del Conductor','disabled']) !!}
        </div>
    </div>

    <div class="row">      
      <div class="form-group col-lg-3">
        <a href="{{route('admin.conductores.index')}}" class="btn btn-primary">Regresar</a>
      </div>
    </div>
@endsection()
