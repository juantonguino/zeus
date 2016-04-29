@extends('admin.template.main')
@section('title', 'Editar Cliente')
@section('title_section', 'Editar Cliente '.$cliente->nombres)
@section('content')
{!! Form::open(['route'=>['admin.cliente.update', $cliente->id], 'method'=>'PUT']) !!}
<div class="row">
    <div class="form-group col-lg-3">
      {!! Form::label('tipo_documento', 'Tipo de Documento:') !!}
      {!! Form::select('tipo_documento', [
        'Cédula de Ciudadania'=>'Cédula de Ciudadania',
        'Tarjeta de Identidad'=>'Tarjeta de Identidad',
        'Cedula Extrangera'=>'Cedula Extrangera',
        'Pasaporte'=>'Pasaporte',
        'Otro'=>'Otro'], $cliente->tipo_documento,['class'=>'form-control']) !!}
    </div>
    <div class="form-goup col-lg-3">
      {!! Form::label('numero_documento', 'Numero de Documento:') !!}
      {!! Form::number('numero_documento', $cliente->numero_documento, ['class'=>'form-control', 'placeholder'=>'Numero de documento', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-3">
      {!! Form::label('nombres', 'Nombres:') !!}
      {!! Form::text('nombres', $cliente->nombres, ['class'=>'form-control', 'placeholder'=>'Nombres']) !!}
    </div>
    <div class="form-goup col-lg-3">
      {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
      {!! Form::date('fecha_nacimiento', $cliente->fecha_nacimiento, ['class'=>'form-control', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-3">
      {!! Form::label('telefono', 'Telefono:') !!}
      {!! Form::number('telefono', $cliente->telefono, ['class'=>'form-control', 'placeholder'=>'Telefono', 'required']) !!}
    </div>
    <div class="form-goup col-lg-3">
      {!! Form::label('correo_electronico', 'Correo Electronico:') !!}
      {!! Form::email('correo_electronico', $cliente->correo_electronico, ['class'=>'form-control', 'placeholder'=>'Correo Electronico', 'required']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::textarea('direccion', $cliente->direccion, ['class'=>'form-control', 'placeholder'=>'Direccion', 'required']) !!}
  </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    {!! Form::submit('Editar Cliente', ['class'=>'btn btn-warning']) !!}
  </div>
  <div class="form-group col-lg-3">
    <a href="{{route('admin.cliente.index', $cliente->grupo_id)}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
{!! Form::close() !!}
@endsection
