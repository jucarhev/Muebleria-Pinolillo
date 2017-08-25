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
	<script src="js/funciones.js"></script>
</head>
<body onload="contenidos();return false">
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
							<form class="form-inline" action="php/verif/comprobar.php" method="post">
								<div class="form-group">
									<input type="email" name="UserName" class="form-control" placeholder="Correo electronico">
								</div>
								<div class="form-group">
									<input type="password" name="UserPass"  class="form-control" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary">Entrar</button>
							</form>
							<div class="oculto">
								<a href="#" title="Iniciar sesion"><span class="glyphicon glyphicon-user"></span> Iniciar sesion</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<nav class="navbar navbar-default" role="navigation">
		<div class="container fluid">
		  	<div class="navbar-header">
			  	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				  	<span class="sr-only">Navegación</span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
			    </button>
	  		</div>
	  		<div class="collapse navbar-collapse navbar-ex1-collapse">
	    		<ul class="nav navbar-nav">
				    <li class="active" onclick="contenidos();return false"	><a href="#">Home</a></li>
				    <li><a href="#" onclick="paginasNav(1);return false">Proveedores</a></li>
				    <li><a href="#" onclick="paginasNav(2);return false">Servicios</a></li>
				    <li><a href="#" onclick="paginasNav(3);return false">Registrate</a></li>
				    <li><a href="#" onclick="paginasNav(4);return false">Nosotros</a></li>
				    <li>
				    	<a href="#" onclick="carrito();return false">
				    		Carrito <span class="badge" id="cantidad">0</span><span class="badge oculto" id="arreglo" ></span>
				    	</a>
				    </li>
	    		</ul>
	  		</div>
  		</div>
	</nav>

	<section class="container" id="CargaCuerpo">
		
	</section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4 text-center">
					<h2>Ubicacion</h2>
					<img src="img/mapa.jpg" class="img-thumbnail">
				</div>
				<div class="col-md-4 text-justify">
					<div class="text-center"><h2>Sucursales</h2></div>
					Muebles Pinolillo, cuenta con 5 sucursales en todo el pais, puede visitar la mas cercana a usted. 
					O si lo prefiere realice compras en linea, rapido y seguro, en la compra de mas de 5000.00 la 
					entrega va por nuestra cuenta.
					<div class="text-left">
						<ul>
							<li>Pachuca, Hidalgo</li>
							<li>Mexico, D.F.</li>
							<li>Xalapa, Veracruz</li>
							<li>Monterrey, Nuevo Leon</li>
							<li>Merida, Yucatan</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<h2>Visitanos</h2>
					<div class="text-left">
						Visitanos en nuestras sucursales, o llamanos: <br>
						Tel: (555) 555 555 555 <br>
						Cel: 77 12 23 56 87 <br>
						Fax: (43)23 54 67 87 89 <br>
						Mail: Muebles_Pinolillo@gmail.com <br>
						Cel2: 77 23 98 25 93 <br>
						Tel2: (5555) 567 466 456 988 <br>
						O buscanos en faceboo, twitter o google plus, para obtener
						los beneficios de informacion, oferatas y mas.
					</div>
				</div>
			</div>
		</div>
	</footer>
<!-- Modal inicio session-->
<div class="modal fade" id="detalles_mueble" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
</body>
</html>