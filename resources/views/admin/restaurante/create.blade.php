@extends('admin.template.main')
@section('title', 'Crear Restaurante')
@section('title_section', 'Crear Restaurante')
@section('content')
{!! Form::open(['route'=>'admin.restaurante.store', 'method'=>'POST']) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del restaurante', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('capacidad', 'Capacidad:') !!}
        {!! Form::number('capacidad', null, ['class'=>'form-control', 'placeholder'=>'Capacidad del restaurante', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::number('telefono', null, ['class'=>'form-control', 'placeholder'=>'Telefono del restaurante', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('direccion', 'Direccion:') !!}
        {!! Form::textarea('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion del restaurante', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('administrador', 'Administrador:') !!}
        {!! Form::text('administrador', null, ['class'=>'form-control', 'placeholder'=>'Administrador del restaurante', 'required']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    {!! Form::submit('Registrar Restaurante', ['class'=>'btn btn-success']) !!}
  </div>
  <div class="form-group col-lg-3">
    <a href="{{route('admin.restaurante.index')}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
{!! Form::close() !!}
@endsection
