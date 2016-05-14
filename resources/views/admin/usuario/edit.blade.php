@extends('admin.template.main')
@section('title', 'Editar Usuario')
@section('title_section', 'Editar Usuario '.$usuario->name)
@section('content')
{!! Form::open(['route'=>['admin.usuario.update', $usuario->id], 'method'=>'PUT']) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', $usuario->name, ['class'=>'form-control', 'placeholder'=>'Nombre del usuario', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('email', 'Correo ELectronico:') !!}
        {!! Form::email('email', $usuario->email, ['class'=>'form-control', 'placeholder'=>'Correo electronico del usuario', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('password', 'Contraseña:') !!}
        {!! Form::text('password', null, ['class'=>'form-control', 'placeholder'=>'Nueva contraseña del usuario']) !!}
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
