<?php
$user=$_POST['user'];
$id=$_POST['id'];
$query="SELECT * from encuesta where id=$id";
include '../lib/lib.php';
$obj=new Lib();
$limite=$_POST['limite'];
$pagina=$_POST['pagina'];
$sql="SELECT * from pregunta WHERE idencuesta=".$id." LIMIT ".$limite.",".$pagina;
$sql2="SELECT * from opciones WHERE idencuesta=".$id;

$contador=$obj->conteo($sql);

$data=$obj->Obtendatos($sql);
$data2=$obj->Obtendatos($sql2);
$numb=1;
$array0=null;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Tomar encuesta</h4>
</div>
<div class="modal-body">
	<div id="verlaencuesta">
		<?php
			foreach ($data as $key) {
				$idpregunta=$key['id'];
				echo '<label>'.($limite+1).'.- '.$key['pregunta']."</label><br>";
				$array0.=','.$idpregunta;
				foreach ($data2 as $keys) {
					$idopcion=$keys['id'];
					echo '<label class="radio-inline">';
					echo '<input type="radio" name="'.$idpregunta.'" value="'.$keys['opcion'].'" onchange="preopcenc('.$idpregunta.','.$idopcion.');return false">'.$keys['opcion'];
					echo '</label>';
				}
				$numb++;
				echo '<hr>';
				echo '<button type="submit" class="btn btn-primary" onclick="tomarencuestaventana('.$id.','.($limite+1).',1);return false">Siguiente</button>';
			}
		?>
		<input type="hidden" id="idpeo" value="">
	</div>
</div>