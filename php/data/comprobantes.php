<link rel="stylesheet" href="../../css/bootstrap.css">
<?php  
include "../lib/lib.php";
$obj=new Lib();
echo $id=$_GET['id'];
$data=$obj->Obtendatos("SELECT * FROM fotos");
foreach($data as $row):
	echo '<img src="../../photos/'.$row['nombre_foto'].'" class="img-galeria-comprobante img-thumbnail">';
endforeach;
?>
<style type="text/css" media="screen">
	.img-galeria-comprobante{
		width:100px;
		margin-left:2px;
	}
</style>