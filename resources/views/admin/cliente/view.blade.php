@extends('admin.template.main')
@section('title', 'Ver Cliente')
@section('title_section', 'Ver Cliente '.$cliente->nombres)
@section('content')
<div class="row">
    <div class="form-group col-lg-3">
      {!! Form::label('tipo_documento', 'Tipo de Documento:') !!}
      {!! Form::select('tipo_documento', [
        'Cédula de Ciudadania'=>'Cédula de Ciudadania',
        'Tarjeta de Identidad'=>'Tarjeta de Identidad',
        'Cedula Extrangera'=>'Cedula Extrangera',
        'Pasaporte'=>'Pasaporte',
        'Otro'=>'Otro'], $cliente->tipo_documento,['class'=>'form-control', 'disabled'=>'true']) !!}
    </div>
    <div class="form-goup col-lg-3">
      {!! Form::label('numero_documento', 'Numero de Documento:') !!}
      {!! Form::number('numero_documento', $cliente->numero_documento, ['class'=>'form-control', 'placeholder'=>'Numero de documento', 'required','disabled'=>'true']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-3">
      {!! Form::label('nombres', 'Nombres:') !!}
      {!! Form::text('nombres', $cliente->nombres, ['class'=>'form-control', 'placeholder'=>'Nombres', 'required','disabled'=>'true']) !!}
    </div>
    <div class="form-goup col-lg-3">
      {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
      {!! Form::date('fecha_nacimiento', $cliente->fecha_nacimiento, ['class'=>'form-control', 'required','disabled'=>'true']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-3">
      {!! Form::label('telefono', 'Telefono:') !!}
      {!! Form::number('telefono', $cliente->telefono, ['class'=>'form-control', 'placeholder'=>'Telefono', 'required','disabled'=>'true']) !!}
    </div>
    <div class="form-goup col-lg-3">
      {!! Form::label('correo_electronico', 'Correo Electronico:') !!}
      {!! Form::email('correo_electronico', $cliente->correo_electronico, ['class'=>'form-control', 'placeholder'=>'Correo Electronico', 'required', 'disabled'=>'true']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::textarea('direccion', $cliente->direccion, ['class'=>'form-control', 'placeholder'=>'Direccion', 'required', 'disabled'=>'true']) !!}
  </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.cliente.index', $cliente->grupo_id)}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
@endsection()
