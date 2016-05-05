@extends('admin.template.main')
@section('title', 'Crear Dia del Grupo')
@section('title_section', 'Crear Dia')
@section('content')
  {!! Form::open(['route'=>['admin.dia.store', $id], 'method'=>'POST']) !!}
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('destino', 'Destino:') !!}
            {!! Form::text('destino', null, ['class'=>'form-control', 'placeholder'=>'Destino', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-3">
            {!! Form::label('dinero_asignado', 'Dinero Asignado:') !!}
            {!! Form::number('dinero_asignado', null, ['class'=>'form-control', 'placeholder'=>'Dinero Asignado', 'required']) !!}
        </div>
        <div class="form-group col-lg-3">
            {!! Form::label('total_gastado', 'Total Gastado:') !!}
            {!! Form::number('total_gastado', null, ['class'=>'form-control', 'placeholder'=>'Total Gastado', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-3">
            {!! Form::label('fecha', 'Fecha:') !!}
            {!! Form::date('fecha', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group col-lg-3">
            {!! Form::label('hotel_id', 'Hotel:') !!}
            {!! Form::select('hotel_id', $listahoteles, null, ['class'=>'form-control', 'placeholder'=>'Hotel', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('instrucciones_recorrido_guia', 'Instrucciones par el guia:') !!}
            {!! Form::textarea('instrucciones_recorrido_guia', null, ['class'=>'form-control', 'placeholder'=>'Instrucciones par el guia', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('recorrido_plan', 'Recorrido del Plan:') !!}
            {!! Form::textarea('recorrido_plan', null, ['class'=>'form-control', 'placeholder'=>'Recorrido del Plan', 'required']) !!}
        </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-3">
        {!! Form::submit('Registrar Dia', ['class'=>'btn btn-success']) !!}
      </div>
      <div class="form-group col-lg-3">
        <a href="{{route('admin.dia.index', $id)}}" class="btn btn-primary">Regresar</a>
      </div>
    </div>
  {!! Form::close() !!}
@endsection()
