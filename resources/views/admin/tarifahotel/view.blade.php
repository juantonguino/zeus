@extends('admin.template.main')
@section('title', 'Ver Tarifa')
@section('title_section', 'Ver Tarifa '.$tarifa->concepto)
@section('content')
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::number('valor', $tarifa->valor, ['class'=>'form-control', 'placeholder'=>'El valor de la tarifa', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('concepto', 'Concepto:') !!}
        {!! Form::textarea('concepto', $tarifa->concepto, ['class'=>'form-control', 'placeholder'=>'El concepto de la tarifa', 'required', 'disabled']) !!}
    </div>
</div>
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.tarifahotel.index', $tarifa->hotel_id)}}" class="btn btn-primary">Regresar</a>
  </div>
</div>
@endsection
