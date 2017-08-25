<?php  
	$arreglo=$_POST['arreglo'];

?>

<div class="panel panel-primary">
	<div class="panel-heading">
		Lista de productosss
	</div>
	<div class="panel-body">
		<table class="table table-striped table-condensed table-hover">
			<tr>
				<th>Number</th>
				<th>ID</th>
				<th>Producto</th>
				<th>Precio</th>
				<th>Tipo</th>
				<th>Eliminar</th>
			</tr>
<?php 
include "../lib/lib.php";
$obj=new Lib();

$num_letras=strlen($arreglo);
//$subs=substr($arreglo, 1);//Quita el primer elemento del string
$piezas = explode(",", $arreglo);
$conteo=count($piezas);
$arrgloenvio="";
for ($i=0; $i < $conteo; $i++) { 
	$arrgloenvio.=','.$piezas[$i];
}
$subs=substr($arrgloenvio, 1);

$result=array_count_values($piezas);
$cadena=null;
$n=0;
$m=1;
$valor=0;
for ($i=0; $i < $conteo; $i++) { 
	$idProducto=$piezas[$i];
	if ($idProducto==0) {
		echo '<td colspan="6">No hay registros</td>';
	}else{
	$sql="SELECT * FROM muebles WHERE id=$idProducto";
	$datos=$obj->Obtendatos($sql);
	foreach ($datos as $row):
		$n++;
		echo "<tr>";
		echo "<td>".$m++."</td>";
		echo "<td>".$piezas[$i]."</td>";
		echo "<td>".$row['mueble']."</td>";
		echo "<td>".$pago=$row['precio']."</td>";
		echo "<td>".$row['categoria']."</td>";
		echo "<td><a onclick='Eliminar(".($n-1).");return false' class='btn btn-danger'>Eliminar</a></td>";
		echo "</tr>";
		$valor=$valor+$pago;
	endforeach;
	}
}
$String="";
for ($i=0; $i < $conteo; $i++) { 
	$String.=",".$piezas[$i];
}
$DataReporte=substr($String, 1);
$dataReporteCodificado=base64_encode($DataReporte);
?>
		</table>
	</div>
	<div class="panel-footer">
		<a class="btn btn-success" onclick="alerta();return false">
	  		Comprar <span class="badge">Total: $<?php echo $valor; ?></span>
		</a>
		<a class="btn btn-success" href="php/lib/reporte.php?id=<?php echo $dataReporteCodificado; ?>" target="_blank">
	  		Generar factura <span class="badge">Total en productos: <?php echo $n; ?></span>
		</a>
	</div>
</div>