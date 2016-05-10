@extends('admin.template.main')
@section('title', 'Asignacion')
@section('title_section', 'Asignacion')
@section('content')
{!! Form::open(['route'=>['admin.asignar.store'], 'method'=>'POST']) !!}
<div class="row">
    <div class="form-group col-lg-3">
      {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
      {!! Form::date('fecha_inicio', null, ['class'=>'form-control', 'placeholder'=>'Nombres', 'required']) !!}
    </div>
    <div class="form-goup col-lg-3">
      {!! Form::label('fecha_fin', 'Fecha Fin') !!}
      {!! Form::date('fecha_fin', null, ['class'=>'form-control', 'placeholder'=>'Numero de documento', 'required']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    {!! Form::submit('Ver Asignacion', ['class'=>'btn btn-info']) !!}
  </div>
</div>
{!! Form::close() !!}
@endsection
