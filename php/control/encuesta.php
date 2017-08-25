<div class="container">
<form>
<?php 
include '../lib/lib.php';
$obj=new Lib();
$id=$_POST['id'];
$sql="SELECT * from pregunta WHERE idencuesta=".$id;
$sql2="SELECT * from opciones WHERE idencuesta=".$id;
$data=$obj->Obtendatos($sql);
$data2=$obj->Obtendatos($sql2);
$numb=1;
$array0=null;
foreach ($data as $key) {
	$idpregunta=$key['id'];
	echo '<label>'.$numb.'.- '.$key['pregunta']."</label><br>";
	$array0.=','.$idpregunta;
	foreach ($data2 as $keys) {
		$idopcion=$keys['id'];
		echo '<label class="radio-inline">';
		echo '<input type="radio" name="'.$idpregunta.'" value="">'.$keys['opcion'];
		echo '</label>';

	}
	$numb++;
	echo '<br>';
}
?>
</form>
</div>