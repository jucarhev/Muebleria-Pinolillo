<ul class="nav nav-tabs">
	<li role="presentation" class="active"><a href="#" title=""  onclick="catalogo(1);return false">Salas</a></li>
	<li><a href="#" title=""  onclick="catalogo(2);return false">Comedores</a></li>
	<li><a href="#" title=""  onclick="catalogo(3);return false">Recamaras</a></li>
	<li><a href="#" title=""  onclick="catalogo(4);return false">Oficinas</a></li>
	<li><a href="#" title=""  onclick="catalogo(5);return false">Mascotas</a></li>
	<li><a href="#" title=""  onclick="catalogo(6);return false">Baños</a></li>
</ul>
<div class="line"></div>
<?php 
include "../lib/lib.php";
$obj=new Lib();
$sql="select * from muebles where categoria='Salas'";
$a_users = $obj->Obtendatos($sql); 
foreach ($a_users as $row):
?>
	<div class="col-md-4">
		<img src="photos/<?php echo $row['imagen']; ?>" class="img-thumbnail">
		<div class="text-center"><span class="h4"><?php echo $row['mueble']; ?></span></div>
		<div class="text-justify">
			Precio: $<?php echo $row['precio'].".00"; ?>
			<br>
			<div class="btn-group btn-group-justified">
				<div class="btn-group">
					<button type="button" class="btn btn-primary" onclick="agregarProductoSala(<?php echo $row['id']; ?>);return false">
						Comprar <span class="glyphicon glyphicon-usd"></span>
					</button>
				</div>
				<div class="btn-group">
					<button type="button" class="btn btn-success" data-toggle='modal' data-target='#detalles_mueble_cliente' onclick="Muser(<?php echo $row['id']; ?>);return false">
						Detalles <span class="glyphicon glyphicon-list-alt"></span>
					</button>
				</div>
			</div>
		</div>
	</div>
<?php  endforeach ?>