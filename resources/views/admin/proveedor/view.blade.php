@extends('admin.template.main')
@section('title', 'Ver Proveedor')
@section('title_section', 'Ver Proveedor '.$proveedor->nombre)
@section('content')
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('nombre', 'Nombre:') !!}
          {!! Form::text('nombre', $proveedor->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre del Proveedor', 'required', 'disabled']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('direccion', 'Direccion:') !!}
          {!! Form::textarea('direccion', $proveedor->direccion, ['class'=>'form-control', 'placeholder'=>'Direccion del Proveedor', 'required', 'disabled']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('telefono', 'Telefono:') !!}
          {!! Form::number('telefono', $proveedor->telefono, ['class'=>'form-control', 'placeholder'=>'Telefono del Proveedor', 'required', 'disabled']) !!}
      </div>
  </div>
  <div class="row">
      <div class="form-group col-lg-6">
          {!! Form::label('pagina_web', 'Pagina Web:') !!}
          {!! Form::text('pagina_web', $proveedor->pagina_web, ['class'=>'form-control', 'placeholder'=>'Pagina Web del Proveedor', 'required', 'disabled']) !!}
      </div>
  </div>
  <div class="row">
    <div class="form-group col-lg-3">
      <a href="{{route('admin.proveedor.index')}}" class="btn btn-primary">Regresar</a>
    </div>
  </div>
@endsection
