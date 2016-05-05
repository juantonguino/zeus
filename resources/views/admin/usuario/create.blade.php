@extends('admin.template.main')
@section('title', 'Crear Usuario')
@section('title_section', 'Crear Usuario')
@section('content')
  {!! Form::open(['route'=>'admin.usuario.store', 'method'=>'POST']) !!}
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('nombre', 'Nombre:') !!}
          {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del usuario', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('contrasenia', 'Contraseña:') !!}
          {!! Form::text('contrasenia', null, ['class'=>'form-control', 'placeholder'=>'Contraseña del usuario', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('rol', 'Rol:') !!}
          {!! Form::select('rol', ['1'=>'Administrador', '0'=>'Guia'], null, ['class'=>'form-control', 'placeholder'=>'Rol del usuario', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('guia_id', 'Guia:') !!}
          {!! Form::select('guia_id', $listaguias, null, ['class'=>'form-control', 'placeholder'=>'Guia del usuario', 'required']) !!}
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
