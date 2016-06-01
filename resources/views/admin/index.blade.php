@extends('admin.template.main')
@section('title', 'Inicio')
@section('title_section', 'Bienvenido '.Auth::user()->name)
@section('content')
<h1>Conoce Nariño</h1>
<h3>El encanto está dado por su ubicación en la región Andina y en la
  ramificación de la cordillera de los Andes. Es una tierra rodeada de volcanes
  y posee una amplia zona en la llanura costera Pacífico. Estas condiciones
  ofrecen diversos paisajes para disfrutar en familia</h3>
@endsection
