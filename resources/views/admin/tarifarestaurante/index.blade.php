@extends('admin.template.main')
@section('title', 'Lista de Tarifas')
@section('title_section','Lista de Tarifas del Restaurante '.$restaurante->nombre)
@section('content')
<div class="row">
    <div class="form-group col-lg-3">
      <a href="{{route('admin.tarifarestaurante.create', $restaurante->id)}}" class="btn btn-success">Registrar Nueva Tarifa</a>
    </div>
    <div class="form-group col-lg-3">
      <a href="{{route('admin.restaurante.index')}}" class="btn btn-primary">Regresar</a>
    </div>
</div>
<hr/>
<table class="table">
    <thead>
        <tr>
            <th>Valor</th>
            <th>Concepto</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tarifas as $tarifa)
        @endforeach
    </tbody>
</table>
{!! $tarifas->render() !!}
@endsection
