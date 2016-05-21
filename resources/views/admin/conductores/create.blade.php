@extends('admin.template.main')
@section('title', 'Crear Conductor')
@section('title_section', 'Crear Conductor')
@section('content')
  {!! Form::open(['route'=>'admin.conductores.store', 'method'=>'POST']) !!}
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('cedula', 'Cedula:') !!}
              {!! Form::number('cedula', null, ['class'=>'form-control', 'placeholder'=>'Numero de Cedula del Conductor', 'required']) !!}
          </div>
      </div>
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('nombres', 'Nombre Completo:') !!}
              {!! Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Nombre completo del Conductor', 'required']) !!}
          </div>
      </div>
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('telefono', 'Telefono:') !!}
              {!! Form::number('telefono', null, ['class'=>'form-control', 'placeholder'=>'Telefono del Conductor', 'required']) !!}
          </div>
      </div>
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
              {!! Form::date('fecha_nacimiento', null, ['class'=>'form-control', 'placeholder'=>'Fecha de Nacimiento del Conductor']) !!}
          </div>
      </div>
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('direccion', 'Direccion:') !!}
              {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion del Conductor']) !!}
          </div>
      </div>
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('correo_electronico', 'Correo:') !!}
              {!! Form::email('correo_electronico', null, ['class'=>'form-control', 'placeholder'=>'Correo Electronico del Conductor']) !!}
          </div>
      </div>
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('perfil_academico', 'Perfil Academico:') !!}
              {!! Form::text('perfil_academico', null, ['class'=>'form-control', 'placeholder'=>'Perfil Academico del Conductor']) !!}
          </div>
      </div>

      <div class="row">
        <div class="form-group col-lg-3">
          {!! Form::submit('Registrar Conductor', ['class'=>'btn btn-success']) !!}
        </div>
        <div class="form-group col-lg-3">
          <a href="{{route('admin.conductores.index')}}" class="btn btn-primary">Regresar</a>
        </div>
      </div>
  {!! Form::close() !!}
@endsection()
