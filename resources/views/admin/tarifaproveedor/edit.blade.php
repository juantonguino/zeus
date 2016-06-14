@extends('admin.template.main')
@section('title', 'Editar Tarifa')
@section('title_section', 'Editar Tarifa '.$tarifa->concepto)
@section('content')
{!! Form::open(['route'=>['admin.tarifaproveedor.update', $tarifa->id], 'method'=>'PUT']) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::number('valor', $tarifa->valor, ['class'=>'form-control', 'placeholder'=>'El valor de la tarifa', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('concepto', 'Concepto:') !!}
        {!! Form::textarea('concepto', $tarifa->concepto, ['class'=>'form-control', 'placeholder'=>'El concepto de la tarifa', 'required']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
  </div>
  <div class="form-group col-lg-3">
    <a href="{{route('admin.tarifaproveedor.index', $tarifa->proveedor_id)}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
{!! Form::close() !!}
@endsection
