@extends('admin.template.main')
@section('title', 'Inicio')
@section('title_section', 'Bienvenido '.Auth::user()->name)
@section('content')
<h3>Conoce Nariño</h3>
<h4>El encanto está dado por su ubicación en la región Andina y en la
  ramificación de la cordillera de los Andes. Es una tierra rodeada de volcanes
  y posee una amplia zona en la llanura y su costa Pacífica. Estas condiciones
  ofrecen diversos paisajes para disfrutar en familia</h4>
@endsection
