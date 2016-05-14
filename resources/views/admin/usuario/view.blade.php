@extends('admin.template.main')
@section('title', 'Ver Usuario')
@section('title_section', 'Ver Usuario '.$usuario->name)
@section('content')
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', $usuario->name, ['class'=>'form-control', 'placeholder'=>'Nombre del usuario', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('email', 'Correo ELectronico:') !!}
        {!! Form::email('email', $usuario->email, ['class'=>'form-control', 'placeholder'=>'Correo electronico del usuario', 'required', 'disabled']) !!}
    </div>
</div>
<!--
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('password', 'Contraseña:') !!}
        {!! Form::text('password', $usuario->password, ['class'=>'form-control', 'placeholder'=>'Contraseña del usuario', 'required', 'disabled']) !!}
    </div>
</div>
-->
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.usuario.index')}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
@endsection
