<?php  
$id=$_POST['id'];
?>
<input type="hidden" id="idpedido" value="<?php echo $id; ?>">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Subir comprobante de pago</h4>
</div>
<div class="modal-body">
<div class="content">
            <input type="file" id="images" name="images[]" />
            <button id="btnSubmit">Subir archivo</button>
            <ul id="lista-imagenes">
                
            </ul>
            <div id="response"></div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="js/upload.js"></script>
</div>