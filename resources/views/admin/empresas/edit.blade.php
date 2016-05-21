@extends('admin.template.main')
@section('title', 'Editar Empresa')
@section('title_section', 'Editar Empresa de Transporte '.$empresa->nombre)
@section('content')
  {!! Form::open(['route'=>['admin.empresas.update',$empresa->id], 'method'=>'PUT']) !!}
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('name', 'Nombre:') !!}
              {!! Form::text('nombre', $empresa->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre de la Empresa', 'required']) !!}
          </div>
      </div>
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('telefono', 'Telefono:') !!}
              {!! Form::number('telefono', $empresa->telefono, ['class'=>'form-control', 'placeholder'=>'Telefono de la Empresa']) !!}
          </div>
      </div>
      <div class="row">
          <div class="form-group col-lg-6">
              {!! Form::label('direccion', 'Direccion:') !!}
              {!! Form::text('direccion', $empresa->direccion, ['class'=>'form-control', 'placeholder'=>'Direccion de la Empresa']) !!}
          </div>
      </div>
      <div class="row">
        <div class="form-group col-lg-3">
          {!! Form::submit('Editar', ['class'=>'btn btn-warning']) !!}
        </div>
        <div class="form-group col-lg-3">
          <a href="{{route('admin.empresas.index')}}" class="btn btn-primary">Regresar</a>
        </div>
      </div>
  {!! Form::close() !!}
@endsection()
