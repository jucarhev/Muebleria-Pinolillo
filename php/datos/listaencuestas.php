<?php
include "../lib/lib.php"; 
$obj=new Lib();
$pagina=$_POST['x'];
//$pagina=1;
$data=array('id','nombre','fecha');
$funciones_JS = array('eliminaencuesta', 'VerEncuesta', '',4);
$respuesta=$obj->conteo("select * from encuesta");
$where="";
$funcionJS="ListarEncuestas";
$paginacion=$obj->paginas("encuesta",$where,$pagina,$funcionJS);

?>
<div class="panel panel-default">
	<div class="panel-heading">
		Hola
	</div>
	<div class="panel-body">
		<table class="table table-striped table-condensed table-hover">
			<tr>
				<th>ID</th>
				<th>Encuesta</th>
				<th>Fecha</th>
				<th colspan="2">Opciones</th>
				<?php echo $obj->paginarListadoRegistros("encuesta",$data,"",$funciones_JS,"true",$paginacion[0],$paginacion[1]); ?>
			</tr>
		</table>
		<ul class="pagination">
			<?php echo $paginacion[2]; ?>
		</ul>
	</div>
</div>