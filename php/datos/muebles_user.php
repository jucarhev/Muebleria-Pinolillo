<?php 
include "../lib/lib.php";
$obj=new Lib();
$id=$_POST['id'];
$sql="select * from muebles where id=$id";
$data = $obj->Obtendatos($sql); 
foreach ($data as $row):
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Ver datelles del mueble</h4>
</div>
<div class="modal-body">
<img src="photos/<?php echo $row['imagen']; ?>" class="img-thumbnail">
Nombre: <?php echo $row['mueble']; ?><br>
Precion: <?php echo $row['precio']; ?><br>
Categoria: <?php echo $row['categoria']; ?>

</div>
<?php  endforeach ?>