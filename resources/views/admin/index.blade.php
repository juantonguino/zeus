@extends('admin.template.main')
@section('title', 'Inicio')
@section('title_section', 'Bienvenido '.Auth::user()->name)
@section('content')
@endsection
