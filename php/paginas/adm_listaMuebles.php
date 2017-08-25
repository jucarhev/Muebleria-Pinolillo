<?php
include "../lib/lib.php"; 
$obj=new Lib();
$pagina=$_POST['partida'];
//$pagina=1;
$data=array('id','mueble','precio','descripcion','categoria');
$funciones_JS = array('eliminarMueble', 'editarMueble', 'verMueble',3);
$respuesta=$obj->conteo("select * from muebles");
$where="categoria='Salas'";
$funcionJS="listarMuebles";
$paginacion=$obj->paginas("muebles",$where,$pagina,$funcionJS);

?>
<div class="panel panel-default">
	<div class="panel-heading">
		<button class="btn btn-success" type="button">
	  		Lista de muebles <span class="badge"><?php echo $respuesta; ?> en total</span>
		</button>
		<button class="btn btn-primary" type="button" data-toggle='modal' data-target='#ventana2' onclick="agregarMueble();return false">
	  		Agregar nuevo mueble <span class="glyphicon glyphicon glyphicon-plus-sign"></span>
		</button>
	<div class="panel-body">
		<table class="table table-striped table-condensed table-hover">
			<tr>
				<th>ID</th>
				<th>Mueble</th>
				<th>Precio</th>
				<th>Descripcion</th>
				<th>Categoria</th>
				<th colspan="2">Opciones</th>
				<?php echo $obj->paginarListadoRegistros("muebles",$data,"",$funciones_JS,"true",$paginacion[0],$paginacion[1]); ?>
			</tr>
		</table>
		<ul class="pagination">
			<?php echo $paginacion[2]; ?>
		</ul>		
	</div>
</div>