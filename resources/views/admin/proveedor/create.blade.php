@extends('admin.template.main')
@section('title', 'Crear Proveedor')
@section('title_section', 'Crear Proveedor')
@section('content')
  {!! Form::open(['route'=>'admin.proveedor.store', 'method'=>'POST']) !!}
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('nombre', 'Nombre:') !!}
          {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Proveedor', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('direccion', 'Direccion:') !!}
          {!! Form::textarea('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion del Proveedor', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('telefono', 'Telefono:') !!}
          {!! Form::number('telefono', null, ['class'=>'form-control', 'placeholder'=>'Telefono del Proveedor', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('pagina_web', 'Pagina Web:') !!}
          {!! Form::text('pagina_web', null, ['class'=>'form-control', 'placeholder'=>'Pagina Web del Proveedor', 'required']) !!}
      </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-3">
      {!! Form::submit('Registrar Proveedor', ['class'=>'btn btn-success']) !!}
    </div>
    <div class="form-group col-lg-3">
      <a href="{{route('admin.proveedor.index')}}" class="btn btn-primary">Regresar</a>
    </div>
  </div>
  {!! Form::close() !!}
@endsection
