@extends('admin.template.main')
@section('title', 'Crear Usuario')
@section('title_section', 'Crear Usuario')
@section('content')
  {!! Form::open(['route'=>'admin.usuario.store', 'method'=>'POST']) !!}
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('name', 'Nombre:') !!}
          {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre del usuario', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('email', 'Correo ELectronico:') !!}
          {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Correo electronico del usuario', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('password', 'Contraseña:') !!}
          {!! Form::text('password', null, ['class'=>'form-control', 'placeholder'=>'Contraseña del usuario', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('guia', 'Guia:') !!}
          {!! Form::select('guia_id', $guias, null, ['class'=>'form-control', 'placeholder'=>'Sleccione el guia al que le pertenece']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('type', 'Tipo:') !!}
          {!! Form::select('type', ['admin'=>'Administrador','empleado'=>'Empleado'], null, ['class'=>'form-control', 'placeholder'=>'Tipo', 'required']) !!}
      </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-3">
      {!! Form::submit('Registrar Usuario', ['class'=>'btn btn-success']) !!}
    </div>
    <div class="form-group col-lg-3">
      <a href="{{route('admin.usuario.index')}}" class="btn btn-primary">Regresar</a>
    </div>
  </div>
  {!! Form::close() !!}
@endsection
