@extends('admin.template.main')
@section('title', 'Lista de Guias')
@section('title_section', 'Lista de Guias')
@section('content')
<div class="row">
  <div class="form-group col-lg-3">
    <a href="{{route('admin.guia.create')}}" class="btn btn-success">Registrar Nuevo Guia</a>
  </div>
</div>
<hr/>
@endsection
