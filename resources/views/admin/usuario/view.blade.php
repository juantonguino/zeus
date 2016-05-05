@extends('admin.template.main')
@section('title', 'Ver Usuario')
@section('title_section', 'Ver Usuario '.$usuario->nombre)
@section('content')
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', $usuario->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre del usuario', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('contrasenia', 'Contraseña:') !!}
        {!! Form::text('contrasenia', $usuario->contrasenia, ['class'=>'form-control', 'placeholder'=>'Contraseña del usuario', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('rol', 'Rol:') !!}
        {!! Form::select('rol', ['1'=>'Administrador', '0'=>'Guia'], $usuario->rol, ['class'=>'form-control', 'placeholder'=>'Rol del usuario', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('guia_id', 'Guia:') !!}
        {!! Form::select('guia_id', $listaguias, $usuario->guia_id, ['class'=>'form-control', 'placeholder'=>'Guia del usuario', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.usuario.index')}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
@endsection
