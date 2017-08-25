<?php  
include "../lib/lib.php";
$obj=new Lib();
$query="SELECT nombre,mueble,precio,cantidad from cliente as cl join pedido as pe on cl.id=pe.idusuario join producto as pr on pe.id=pr.idpedido join muebles as mu on pr.idproducto=mu.id where email='pachuca_lori.tuzo@hotmail.com ' and status='pendiente';";
$arreglo=$obj->conteo($query);
$variable=$obj->Obtendatos($query);
?>
<table class="table table-striped table-condensed table-hover">
	<tr>
		<th>Nombre</th>
		<th>Mueble</th>
		<th>Precio</th>
	</tr>
<?php
foreach ($variable as $key):
	echo "<tr>";
	echo "<td>".$key['nombre']."</td>";
	echo "<td>".$key['mueble']."</td>";
	echo "<td>".$key['precio']."</td>";
	echo "</tr>";
endforeach;
?>
</table>