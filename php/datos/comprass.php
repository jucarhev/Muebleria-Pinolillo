<?php 
$user=$_POST['user'];
include "../lib/lib.php";
$obj=new Lib();

$sql="select * from cliente where email='$user'";
$a_users = $obj->Obtendatos($sql); 
foreach ($a_users as $row):
	$id=$row['id'];
endforeach;
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<ul class="nav nav-pills">
            <li role="presentation"><a href="#" onclick="compras();return false">Pedidos pendientes</a></li>
            <li role="presentation"><a href="#" onclick="comprass();return false">Pedidos completados</a></li>
        </ul>
	</div>
	<div class="panel-body comprasUser">
		<table class="table table-striped table-condensed table-hover">
			<tr>
				<th>ID</th>
				<th>Status</th>
				<th>Fecha</th>
				<th colspan="3">Opciones</th>
			</tr>
			<?php echo $obj->paginarListadoRegistros('pedido',$data=array('id','status','fechainicio'),"where status='terminado'",$funciones_JS=array('verpedido','','',5),'true',0,100); ?>
		</table>
	</div>
	<div class="panel-footer">
		<input type="submit" class="btn btn-primary" value="Subir imagen" id="upload">
	</div>
</div>