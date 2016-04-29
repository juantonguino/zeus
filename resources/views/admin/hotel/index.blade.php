@extends('admin.template.main')
@section('title', 'Lista de Hoteles')
@section('title_section', 'Lista de Hoteles')
@section('content')
  <div class="row">
    <div class="form-group col-lg-3">
      <a href="{{route('admin.hotel.create')}}" class="btn btn-success">Registrar Nuevo Hotel</a>
    </div>
  </div>
  <hr/>
@endsection()
