@extends('admin.template.main')
@section('title', 'Editar Dia')
@section('title_section', 'Ver Dia '.$dia->fecha_mostrar)
@section('content')
{!! Form::open(['route'=>['admin.dia.update', $dia->id], 'method'=>'PUT']) !!}
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('destino', 'Destino:') !!}
          {!! Form::text('destino', $dia->destino, ['class'=>'form-control', 'placeholder'=>'Destino', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('dinero_asignado', 'Dinero Asignado:') !!}
          {!! Form::number('dinero_asignado', $dia->dinero_asignado, ['class'=>'form-control', 'placeholder'=>'Dinero Asignado', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('total_gastado', 'Total Gastado:') !!}
          {!! Form::number('total_gastado', $dia->total_gastado, ['class'=>'form-control', 'placeholder'=>'Total Gastado', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('fecha', 'Fecha:') !!}
          {!! Form::date('fecha', $dia->fecha, ['class'=>'form-control', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('hotel_id', 'Hotel:') !!}
          {!! Form::select('hotel_id', $listahoteles, $dia->hotel_id, ['class'=>'form-control', 'placeholder'=>'Hotel', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('instrucciones_recorrido_guia', 'Instrucciones par el guia:') !!}
          {!! Form::textarea('instrucciones_recorrido_guia', $dia->instrucciones_recorrido_guia, ['class'=>'form-control', 'placeholder'=>'Instrucciones par el guia', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('recorrido_plan', 'Recorrido del Plan:') !!}
          {!! Form::textarea('recorrido_plan', $dia->recorrido_plan, ['class'=>'form-control', 'placeholder'=>'Recorrido del Plan', 'required']) !!}
      </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-3">
      {!! Form::submit('Editar', ['class'=>'btn btn-warning']) !!}
    </div>
    <div class="form-group col-lg-3">
      <a href="{{route('admin.dia.index', $dia->grupo_id)}}" class="btn btn-primary">Regresar</a>
    </div>
  </div>
{!! Form::close() !!}
@endsection
