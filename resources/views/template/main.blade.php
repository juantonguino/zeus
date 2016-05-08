<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>@yield('title','default')</title>
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
			      <a class="navbar-brand" href="#">AGENCIA DE VIAJES</a>
			    </div>
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
						<p class="navbar-text navbar-right"><b>Juan Diego Tonguino</b></p>
					</div>
				</div>
			</nav>
		</footer>
		{{Html::script('plugins/bootstrap/js/jquery.min.js')}}
  	{{Html::script('plugins/bootstrap/js/bootstrap.min.js')}}
		{{Html::script('script_zeus.js')}}
	</body>
</html>
