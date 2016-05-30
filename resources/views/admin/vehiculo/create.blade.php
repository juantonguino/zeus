@extends('admin.template.main')
@section('title','Crear Vehiculo')
@section('title_section', 'Crear Vehiculo')
@section('content')
  {!! Form::open(['route'=>'admin.vehiculo.store', 'method'=>'POST']) !!}
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('placa', 'Placa:') !!}
          {!! Form::text('placa', null, ['class'=>'form-control', 'placeholder'=>'Placa del vehiculo', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('numero', 'Numero:') !!}
          {!! Form::number('numero', null, ['class'=>'form-control', 'placeholder'=>'Numero del vehiculo', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('marca', 'Marca:') !!}
          {!! Form::text('marca', null, ['class'=>'form-control', 'placeholder'=>'Marca del vehiculo', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('linea', 'Linea:') !!}
          {!! Form::text('linea', null, ['class'=>'form-control', 'placeholder'=>'Linea del vehiculo', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('modelo', 'Modelo:') !!}
          {!! Form::number('modelo', null, ['class'=>'form-control', 'placeholder'=>'Modelo del vehiculo', 'required']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('capacidad', 'Capacidad:') !!}
          {!! Form::number('capacidad', null, ['class'=>'form-control', 'placeholder'=>'Capacidad del vehiculo', 'required']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::label('tipo_vehiculo', 'Tipo de Vehiculo:') !!}
          {!! Form::select('tipo_vehiculo', [
            'Carro'=>'Carro',
            'Aeroban'=>'Aeroban',
            'Bus'=>'Bus',
            'Otro'=>'Otro'], null,['class'=>'form-control', 'placeholder'=>'Tipo de transportes']) !!}
      </div>
      <div class="form-group col-lg-3">
          {!! Form::label('empresa_transportes_id', 'Empresa de Transportes:') !!}
          {!! Form::select('empresa_transportes_id', $empresas, null,['class'=>'form-control', 'placeholder'=>'Empresa de transportes']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
        {!! Form::label('conductor_id', 'Conductor:') !!}
        {!! Form::select('conductor_id', $conductores, null,['class'=>'form-control', 'placeholder'=>'Conductor']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-3">
          {!! Form::submit('Registrar Vehiculo', ['class'=>'btn btn-success']) !!}
      </div>
      <div class="form-group col-lg-3">
          <a href="{{route('admin.vehiculo.index')}}" class="btn btn-primary">Regresar</a>
      </div>
  </div>
  {!! Form::close() !!}
@endsection
