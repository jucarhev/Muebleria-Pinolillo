<div class="panel panel-default">
	<div class="panel-heading">
		Estadisticas de encuestas
	</div>
	<div class="panel-body">
		<?php 
		include "../lib/lib.php";
		$obj=new Lib();
		?>
		<table class="table table-striped table-condensed table-hover">
			<tr>
				<th>ID</th>
				<th>Cuestionario</th>
				<th>Fecha</th>
				<th>Hacer</th>
			</tr>
			<?php echo $obj->paginarListadoRegistros('encuesta',$data=array('id','nombre','fecha'),"",$funciones_JS=array('tomarencuesta','','',5),'true',0,100); ?>
		</table>
	</div>
</div>