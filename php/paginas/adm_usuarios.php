<?php 
	include "../lib/lib.php";
	$obj=new Lib();
	$pagina=$_POST['partida'];
	$arra=$obj->paginarRegistros('cliente','',$pagina,'listarUsuarios');
	$limit=$arra[0];
	$registros_Pagina=$arra[1];
	$paginacion=$arra[2];
	$data=array("id","nombre","apellidos","telefono","email","direccion");
	$funciones_JS = array('eliminarUsuario','verUsuario','',4 );

?>
<div class="panel panel-default">
	<div class="panel-heading">Lista de usuario</div>
	<div class="panel-body">
		<table class="table table-striped table-condensed table-hover">
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Telefono</th>
				<th>E-mail</th>
				<th>Direccion</th>
				<th colspan="3">Operaciones</th>
			</tr>
			<?php echo $obj->paginarListadoRegistros('cliente',$data,'',$funciones_JS,'false',$limit,$registros_Pagina); ?>
		</table>
		<?php echo $paginacion; ?>
	</div>
</div>