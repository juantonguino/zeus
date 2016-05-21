@extends('admin.template.main')
@section('title', 'Ver Empresa')
@section('title_section', 'Empresa '.$empresa->nombre)
@section('content')
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', $empresa->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre de la Empresa', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::text('telefono', $empresa->telefono, ['class'=>'form-control', 'placeholder'=>'Telefono de la Empresa', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('direccion', 'Direccion:') !!}
        {!! Form::text('direccion', $empresa->direccion, ['class'=>'form-control', 'placeholder'=>'Direccion de la Empresa', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.empresas.index')}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
@endsection
