@extends('admin.template.main')
@section('title', 'Crear Empresa')
@section('title_section', 'Crear Empresa de Transporte')
@section('content')
  {!! Form::open(['route'=>'admin.empresas.store', 'method'=>'POST']) !!}
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('name', 'Nombre:') !!}
              {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre de la Empresa', 'required']) !!}
          </div>
      </div>
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('telefono', 'Telefono:') !!}
              {!! Form::number('telefono', null, ['class'=>'form-control', 'placeholder'=>'Telefono de la Empresa']) !!}
          </div>
      </div>
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('direccion', 'Direccion:') !!}
              {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion de la Empresa']) !!}
          </div>
      </div>
      <div class="row">
        <div class="form-group col-lg-3">
          {!! Form::submit('Registrar Empresa', ['class'=>'btn btn-success']) !!}
        </div>
        <div class="form-group col-lg-3">
          <a href="{{route('admin.empresas.index')}}" class="btn btn-primary">Regresar</a>
        </div>
      </div>
  {!! Form::close() !!}
@endsection()
