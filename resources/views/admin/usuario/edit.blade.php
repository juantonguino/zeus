@extends('admin.template.main')
@section('title', 'Editar Usuario')
@section('title_section', 'Editar Usuario '.$usuario->nombre)
@section('content')
{!! Form::open(['route'=>['admin.usuario.update', $usuario->id], 'method'=>'PUT']) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', $usuario->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre del usuario', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('contrasenia', 'Contraseña:') !!}
        {!! Form::text('contrasenia', $usuario->contrasenia, ['class'=>'form-control', 'placeholder'=>'Contraseña del usuario', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('rol', 'Rol:') !!}
        {!! Form::select('rol', ['1'=>'Administrador', '0'=>'Guia'], $usuario->rol, ['class'=>'form-control', 'placeholder'=>'Rol del usuario', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('guia_id', 'Guia:') !!}
        {!! Form::select('guia_id', $listaguias, $usuario->guia_id, ['class'=>'form-control', 'placeholder'=>'Guia del usuario', 'required']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    {!! Form::submit('Editar', ['class'=>'btn btn-warning']) !!}
  </div>
  <div class="form-group col-lg-3">
    <a href="{{route('admin.usuario.index')}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
{!! Form::close() !!}
@endsection
