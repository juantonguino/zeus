<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>@yield('title','default') | Panel de Aministracion de Zeus</title>
		{{Html::style('plugins/bootstrap/css/bootstrap.min.css')}}
    {{Html::style('plugins/select2/css/select2.css')}}
    {{Html::style('plugins/select2/css/select2-bootstrap.css')}}
		{{Html::style('style_zeus.css')}}
	</head>
	<body class="admin-body">
		<header class="panel panel-default">
			<nav class="navbar navbar-default">
  			<div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="{{ url('/admin') }}">AGENCIA DE VIAJES</a>
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
							<!--<li><a href="#">Conductor<span class="sr-only">(current)</span></a></li>-->
							<li><a href="{{route('admin.grupo.index')}}">Grupo</a></li>
							<li><a href="{{route('admin.guia.index')}}">Guia</a></li>
							<li><a href="{{route('admin.hotel.index')}}">Hotel</a></li>
							<li><a href="{{route('admin.proveedor.index')}}">Proveedor</a></li>
							<li><a href="{{route('admin.restaurante.index')}}">Restaurante</a></li>
							<li><a href="{{route('admin.usuario.index')}}">Usuario</a></li>
							<li><a href="{{route('admin.conductores.index')}}">Conductor</a></li>
							<li><a href="{{route('admin.empresas.index')}}">Empresa de Transportes</a></li>
							<li><a href="#">Vehiculo</a></li>
							<!--
							<li><a href="{{route('admin.asignar.index')}}">Asignacion</a></li>
							-->
			      </ul>
						<ul class="nav navbar-nav navbar-right">
							<!--
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-bell"></i><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</li>
							-->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <i class="glyphicon glyphicon-cog"></i><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesion</a></li>
								</ul>
							</li>
						</ul>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
			</nav>
		</header>
		<section class="section-admin">
			<div class="panel panel-default">
				<div class="panel-heading">
					<label><h3>@yield('title_section','Titulo de Seccion')</h3></label>
				</div>
				<div class="panel-body">
					@include('flash::message')
					@yield('content','conenido de la seccion')
				</div>
			</div>
		</section>
		<footer class="admin-footer panel panel-default">
			<nav >
				<div class="container-fluid">
					<div class="collapse navbar-collapse">
						<p class="navbar-text">Todos los derechos resservados &copy 2016</p>
						<div class="navbar-text navbar-right">
							<p class=""><b>Juan Diego Tonguino</b></p>
							<p class=""><b>Andres Ojeda Ibarra</b></p>
						</div>
					</div>
				</div>
			</nav>
		</footer>
		<div class="modal fade" tabindex="-1" role="dialog" id="dialog" aria-labelledby="gridSystemModalLabel">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header modal-header-danger">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title" id="gridSystemModalLabel"><p id="title_message"/></h4>
      				</div>
      				<div class="modal-body">
        				<div class="row">
          					<div class="col-lg-8"><p id="texto"/></div>
      					</div>
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        				<button type="button" class="btn btn-danger" id="delete">Eliminar</button>
      				</div>
    			</div>
    		</div>
		</div>
		{{Html::script('plugins/bootstrap/js/jquery.min.js')}}
  	{{Html::script('plugins/bootstrap/js/bootstrap.min.js')}}
		{{Html::script('script_zeus.js')}}
	</body>
</html>
