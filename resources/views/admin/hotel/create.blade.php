@extends('admin.template.main')
@section('title', 'Crear Hotel')
@section('title_section', 'Crear Hotel')
@section('content')
  {!! Form::open(['route'=>'admin.hotel.store', 'method'=>'POST']) !!}
    <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('nombre', 'Nombre:') !!}
          {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del hotel', 'required']) !!}
      </div>
    </div>
  {!! Form::close() !!}
@endsection()
