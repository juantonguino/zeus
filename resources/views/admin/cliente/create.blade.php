@extends('admin.template.main')
@section('title', 'Lista de Clientes del Grupo')
@section('title_section', 'Crear Cliente')
@section('content')
  {!! Form::open(['route'=>['admin.cliente.store', $id], 'method'=>'POST']) !!}
  <div class="row">
      <div class="form-group col-lg-3">
        {!! Form::label('tipo_documento', 'Tipo de Documento:') !!}
        {!! Form::select('tipo_documento', [
          'Cédula de Ciudadania'=>'Cédula de Ciudadania',
          'Tarjeta de Identidad'=>'Tarjeta de Identidad',
          'Cedula Extrangera'=>'Cedula Extrangera',
          'Pasaporte'=>'Pasaporte',
          'Otro'=>'Otro'], null,['class'=>'form-control']) !!}
      </div>
      <div class="form-goup col-lg-3">
        {!! Form::label('numero_documento', 'Numero de Documento:') !!}
        {!! Form::number('numero_documento', null, ['class'=>'form-control', 'placeholder'=>'Numero de documento', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
        {!! Form::label('nombres', 'Nombres:') !!}
        {!! Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Nombres', 'required']) !!}
      </div>
      <div class="form-goup col-lg-3">
        {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
        {!! Form::date('fecha_nacimiento', null, ['class'=>'form-control', 'placeholder'=>'Numero de documento', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::number('telefono', null, ['class'=>'form-control', 'placeholder'=>'Telefono', 'required']) !!}
      </div>
      <div class="form-goup col-lg-3">
        {!! Form::label('correo_electronico', 'Correo Electronico:') !!}
        {!! Form::email('correo_electronico', null, ['class'=>'form-control', 'placeholder'=>'Correo Electronico', 'required']) !!}
      </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-6">
      {!! Form::label('direccion', 'Direccion:') !!}
      {!! Form::textarea('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion', 'required']) !!}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-3">
      {!! Form::submit('Registrar Cliente', ['class'=>'btn btn-success']) !!}
    </div>
    <div class="form-group col-lg-3">
      <a href="{{route('admin.cliente.index', $id)}}" class="btn btn-primary">Regresar</a>
    </div>
  </div>
  {!! Form::close()!!}
@endsection()
