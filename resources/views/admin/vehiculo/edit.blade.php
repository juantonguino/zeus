@extends('admin.template.main')
@section('title','Editar Vehiculo')
@section('title_section', 'Editar Vehiculo')
@section('content')
  {!! Form::open(['route'=>['admin.vehiculo.update', $vehiculo->id], 'method'=>'PUT']) !!}
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('placa', 'Placa:') !!}
          {!! Form::text('placa', $vehiculo->placa, ['class'=>'form-control', 'placeholder'=>'Placa del vehiculo', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('numero', 'Numero:') !!}
          {!! Form::number('numero', $vehiculo->numero, ['class'=>'form-control', 'placeholder'=>'Numero del vehiculo', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('marca', 'Marca:') !!}
          {!! Form::text('marca', $vehiculo->marca, ['class'=>'form-control', 'placeholder'=>'Marca del vehiculo', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('linea', 'Linea:') !!}
          {!! Form::text('linea', $vehiculo->linea, ['class'=>'form-control', 'placeholder'=>'Linea del vehiculo', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('modelo', 'Modelo:') !!}
          {!! Form::number('modelo', $vehiculo->modelo, ['class'=>'form-control', 'placeholder'=>'Modelo del vehiculo', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('capacidad', 'Capacidad:') !!}
          {!! Form::number('capacidad', $vehiculo->capacidad, ['class'=>'form-control', 'placeholder'=>'Capacidad del vehiculo', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('tipo_vehiculo', 'Tipo de Vehiculo:') !!}
          {!! Form::select('tipo_vehiculo', [
            'Carro'=>'Carro',
            'Aeroban'=>'Aeroban',
            'Bus'=>'Bus',
            'Otro'=>'Otro'], $vehiculo->tipo_vehiculo,['class'=>'form-control', 'placeholder'=>'Tipo de transportes']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('empresa_transportes_id', 'Empresa de Transportes:') !!}
          {!! Form::select('empresa_transportes_id', $empresas, $vehiculo->empresa_transportes_id,['class'=>'form-control', 'placeholder'=>'Empresa de transportes']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
        {!! Form::label('conductor_id', 'Conductor:') !!}
        {!! Form::select('conductor_id', $conductores, $vehiculo->conductor_id,['class'=>'form-control', 'placeholder'=>'Conductor']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::submit('Editar', ['class'=>'btn btn-warning']) !!}
      </div>
      <div class="form-group col-lg-3">
          <a href="{{route('admin.vehiculo.index')}}" class="btn btn-primary">Regresar</a>
      </div>
  </div>
  {!! Form::close() !!}
@endsection
