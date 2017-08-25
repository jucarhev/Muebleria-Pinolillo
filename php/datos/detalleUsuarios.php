<?php 
	include "../lib/lib.php";
	$obj=new Lib();
	$id=$_POST['id'];
	$query="SELECT * FROM cliente where id=$id";
	$a_users=$obj->Obtendatos($query);
	foreach ($a_users as $row):
?>
<div class="row">
	<div class="col-md-2">
		<img src="img/Usuario-Icono.jpg" class="img-thumbnail">
	</div>
	<div class="col-md-5">
		<p><strong>Nombre:</strong> <?php echo $row['nombre']; ?></p>
		<p><strong>Apellidos:</strong> <?php echo $row['apellidos']; ?></p>
		<p><strong>Telefono:</strong> <?php echo $row['telefono']; ?></p>
		<p><strong>Direcion:</strong> <?php echo $row['direccion']; ?></p>
		<p><strong>E-mail:</strong> <?php echo $row['email']; ?></p>
		<p><strong>Estado:</strong> <?php echo $row['estado']; ?></p>
		<p><strong>Municipio:</strong> <?php echo $row['municipio']; ?></p>
	</div>
	<div class="col-md-5">
		<p><strong>Codigo postal:</strong> <?php echo $row['cp']; ?></p>
		<p><strong>Fecha regstro:</strong> <?php echo $row['fecharegistro']; ?></p>
		<p><strong>Empresa:</strong> <?php echo $row['empresa']; ?></p>
		<p><strong>Tipo cliente:</strong> <input type="text" id="" value="<?php echo $row['cliente']; ?>" ></p>
		<p><strong>Descuento:</strong> <input type="number" id="" value="<?php echo $row['descuento']; ?>" ></p>
		<p><input type="submit" name="" value="guardar" onclick="" class="btn btn-success"></p>
	</div>
</div>
<?php endforeach; ?>