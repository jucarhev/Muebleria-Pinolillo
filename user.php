<?php 
session_start(); 
$conteo=0;
    if(!isset($_SESSION['usuario'])) 
    {
        header('Location: index.php');
        exit();
    }else{
	    $UserSession=   $_SESSION['usuario'];
	    if (isset($_SESSION['carrito'])) {
	    	$carritoSession=$_SESSION['carrito'];
		    $piezas = explode(",", $carritoSession);
			$conteo=count($piezas);
	    }else{
	    	$carritoSession="";
	    	$conteo=0;
	    }
	}
 ?>
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
<body onload="compras();return false">
<!-- Aqui esta un formularion hidden -->
<input type="hidden" id="UsuarioSession" value="<?php echo $UserSession; ?>" >
<!-- Aqui termina el formulario hidden -->
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
								<a href="#" title="Iniciar sesion"><span class="glyphicon glyphicon-user"></span><?php echo  $UserSession; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading text-center">
							<strong>Herramientas</strong>
						</div>
						<div class="panel-body">
							<ul class="list-group">
								<li class="list-group-item"><a href="#" onclick="compras();return false">Compras</a></li>
								<li class="list-group-item">
									<a href="#" onclick="carritou();return false">
										Productos
									</a> 
									<span class="badge" id="cantidad"><?php echo $conteo; ?></span>
									<span class="badge oculto" id="arreglo" ><?php echo $carritoSession; ?></span>
								</li>
								<li class="list-group-item"><a href="#" onclick="catalogo(1);return false">Catalogo de compra</a></li>
							</ul>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							Herramientas
						</div>
						<div class="panel-body">
							<ul class="list-group">
								<li class="list-group-item"><a href="#" title="">Perfil</a></li>
								<li class="list-group-item"><a href="#" title="">Promociones</a></li>
								<li class="list-group-item"><a href="#" onclick="encuesta_user();return false">Encuestas</a></li>
								<li class="list-group-item"><a href="#" title="">Destacado</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9"></div>
			</div>
		</div>
	</section>
<!-- Modal inicio session-->
<div class="modal fade" id="detalles_mueble_cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="contenedor_user">
	    	
		</div>
	</div>
</div>
<!-- Modal encuestas-->
<div class="modal fade" id="detalles_encuesta_cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="encuestauser">
	    	
		</div>
	</div>
</div>
</body>
</html>