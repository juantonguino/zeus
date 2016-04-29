@extends('admin.template.main')
@section('title', 'Lista de Dias')
@section('title_section', 'Lista de Dias del Grupo '.$grupo->nombre)
@section('content')
  <div class="row">
    <div class="form-group col-lg-3">
      <a href="{{route('admin.dia.create', $grupo->id)}}" class="btn btn-success">Registrar Nuevo Dia</a>
    </div>
    <div class="form-group col-lg-3">
      <a href="{{route('admin.grupo.index')}}" class="btn btn-primary">Regresar</a>
    </div>
  </div>
  <hr/>
@endsection()
