@extends('admin.template.main')
@section('title', 'Crear Tarifa')
@section('title_section', 'Crear Tarifa')
@section('content')
{!! Form::open(['route'=>['admin.tarifaproveedor.store', $id], 'method'=>'POST']) !!}
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('valor', 'Valor:') !!}
          {!! Form::number('valor', null, ['class'=>'form-control', 'placeholder'=>'El valor de la tarifa', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('concepto', 'Concepto:') !!}
          {!! Form::textarea('concepto', null, ['class'=>'form-control', 'placeholder'=>'El concepto de la tarifa', 'required']) !!}
      </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-3">
      {!! Form::submit('Registrar Tarifa', ['class'=>'btn btn-success']) !!}
    </div>
    <div class="form-group col-lg-3">
      <a href="{{route('admin.tarifaproveedor.index', $id)}}" class="btn btn-primary">Regresar</a>
    </div>
  </div>
{!! Form::close() !!}
@endsection
