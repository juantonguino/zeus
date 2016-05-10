@extends('admin.template.main')
@section('title', 'Asignacion')
@section('title_section', 'Asignacion')
@section('content')
<table class="table">
  <thead>
    <tr>
      @foreach($fechas_mostrar as $fecha)
        <th>{{$fecha}}</th>
      @endforeach
    </tr>
  </thead>
</table>
@endsection()
