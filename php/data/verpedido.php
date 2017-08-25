<?php  
$id=$_POST['id'];
include "../lib/lib.php";
$obj=new Lib();
$datos=$obj->Obtendatos("SELECT * FROM producto WHERE idpedido=".$id);
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Ver pedido</h4>
</div>
<div class="modal-body">
	<table class="table table-striped table-condensed table-hover">
		<tr>
			<th>Mueble</th>
			<th>Cantidad</th>
			<th>Total</th>
		</tr>
		<?php echo $obj->paginarListadoRegistros('factura',$data=array('id','mueble','cantidad','total'),"WHERE idpedido=".$id,"",'false',0,100); ?>
		<tr>
			<?php 
				$data=$obj->Obtendatos("SELECT * FROM factura WHERE idpedido=".$id);
				$numb=0;
				foreach ($data as $row):
					$row['total'];
					$numb=$numb+$row['total'];
				endforeach;
			 ?>
			 <td colspan="2">Total</td>
			 <td><?php echo $numb; ?></td>
		</tr>
	</table>
<?php  
$docs=$obj->Obtendatos("SELECT * FROM comprobante WHERE idpedido=".$id);
foreach ($docs as $rows):
	echo '<img src="photos/'.$rows['nombre_foto'].'"  width="100" height="200" style="margin-left:10px;">';
endforeach;


?>
</div>



