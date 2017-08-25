<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/favicon.png">
	<title>Pinolillo</title>
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ajaxupload.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body onload="carga_contenidos(1);return false" >
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-xs-6">
					<img src="img/logo-pinolillo.png" height="80" class="logo">
				</div>
				<div class="col-md-7 col-xs-6">
					<div class="row">
						<div class="col-md-12 text-right">
							<a href="#" title=""><img src="img/redsocial-f.png" height="20" width="20" class="icon-social"></a>
							<a href="#" title=""><img src="img/redsocial-t.png" height="20" width="20" class="icon-social"></a>
							<a href="#" title=""><img src="img/redsocial-y.png" height="20" width="20" class="icon-social"></a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-right pad">
							<div>
								<a href="#" title="Iniciar sesion"><span class="glyphicon glyphicon-user"></span> Iniciar sesion</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="container">
		<div class="row">
			<div class="col-md-3">
				<!-- div class="line"></div -->
				<div class="panel panel-primary">
					<div class="panel-heading">Panel de control</div>
					<div class="panel-body">
						<ul class="list-group">
							<li class="list-group-item"><a href="#" onclick="carga_contenidos(1);return false">Home <span class="glyphicon glyphicon-home"></span></a></li>
							<li class="list-group-item"><a href="#" onclick="listarUsuarios(1);return false">Adm de usuario <span class="glyphicon glyphicon-user"></span></a></li>
							<li class="list-group-item"><a href="#" onclick="listarMuebles(1);return false">Muebles </a></li>
							<li class="list-group-item"><a href="#" onclick="Estadisticas();return false">Estadisticas <span class="glyphicon glyphicon-signal"></span></a></li>
							<li class="list-group-item"><a href="#" onclick="encuestas(0,0);return false">Encuestas </a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				
			</div>
		</div>
	</section>
<!-- Modal inicio session-->
<div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
	    	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ver datos</h4>
			</div>
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>
<!-- Modal inicio session-->
<div class="modal fade" id="ventana1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
	    	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ver registro</h4>
			</div>
			<div class="modal-body">
			<div id="panelusuario-flotante"></div>
			</div>
		</div>
	</div>
</div>
<!-- Modal inicio session-->
<div class="modal fade" id="ventana2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
	    	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agregar nuevo registro</h4>
			</div>
			<div class="modal-body">
			<div id="agregarnuevomueble"></div>
			</div>
		</div>
	</div>
</div>
<!-- Modal encuestas-->
<div class="modal fade" id="encuesta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
	    	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ver encuesta</h4>
			</div>
			<div class="modal-body">
			<div id="verlaencuesta"></div>
			</div>
		</div>
	</div>
</div>
</body>
</html>