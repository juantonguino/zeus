@extends('admin.template.main')
@section('title', 'Editar Restaurante')
@section('title_section', 'Editar Restaurante '.$restaurante->nombre)
@section('content')
{!! Form::open(['route'=>['admin.restaurante.update', $restaurante->id], 'method'=>'PUT']) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', $restaurante->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre del restaurante', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('capacidad', 'Capacidad:') !!}
        {!! Form::number('capacidad', $restaurante->capacidad, ['class'=>'form-control', 'placeholder'=>'Capacidad del restaurante', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::number('telefono', $restaurante->telefono, ['class'=>'form-control', 'placeholder'=>'Telefono del restaurante', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('direccion', 'Direccion:') !!}
        {!! Form::textarea('direccion', $restaurante->direccion, ['class'=>'form-control', 'placeholder'=>'Direccion del restaurante', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('administrador', 'Administrador:') !!}
        {!! Form::text('administrador', $restaurante->administrador, ['class'=>'form-control', 'placeholder'=>'Administrador del restaurante', 'required']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
  </div>
  <div class="form-group col-lg-3">
    <a href="{{route('admin.restaurante.index')}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
{!! Form::open() !!}
@endsection
