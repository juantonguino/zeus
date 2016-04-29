<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>@yield('title','default') | Panel de Aministracion de Zeus</title>
		{{Html::style('plugins/bootstrap/css/bootstrap.min.css')}}
		{{Html::style('style_zeus.css')}}
	</head>
	<body class="admin-body">
		<header class="panel panel-default">
			<nav class="navbar navbar-default">
	  			<div class="container-fluid">
	  			</div>
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
