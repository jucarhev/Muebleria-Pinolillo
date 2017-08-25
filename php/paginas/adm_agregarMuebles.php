<script type="text/javascript">
$(document).ready(function(){
 		t="si";
        var button = $('#upload'), interval;
        new AjaxUpload(button,{
            action: 'php/lib/procesa.php',
            name: 'image',
            onSubmit : function(file, ext){
                // cambiar el texto del boton cuando se selecicione la imagen
                button.text('Subiendo');
                // desabilitar el boton
                this.disable();
 
                interval = window.setInterval(function(){
                    var text = button.text();
                    if (text.length < 11){
                        button.text(text + '.');
                    } else {
                        button.text('Subiendo');
                    }
                }, 200);
            },
            onComplete: function(file, response){
                button.text('Subir Foto');
 
                window.clearInterval(interval);
 
                // Habilitar boton otra vez
                this.enable();
 
                // Añadiendo las imagenes a mi lista
 
                if($('#gallery li').length == 0){
                    $('#gallery').html(response).fadeIn("fast");
                    $('#gallery li').eq(0).hide().show("slow");
                }else{
                    $('#gallery').prepend(response);
                    $('#gallery li').eq(0).hide().show("slow");
                }
            }
        });
		
 
        // Listar  fotos que hay en mi tabla
        $("#gallery").load("php/lib/procesa.php?action=listFotos");
    });
</script>
		<form class="form-horizontal">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="Nombre" class="control-label col-md-3">Nombre</label>
					<div class="col-md-9">
						<input type="text" class="form-control" id="MuebleNombre" placeholder="Nombre del mueble" required>
					</div>
				</div>
				<div class="form-group">
					<label for="Nombre" class="control-label col-md-3 ">Precio</label>
					<div class="col-md-9">
						<input type="number" class="form-control" id="MueblePrecio" placeholder="Precio del mueble" required>
					</div>
				</div>
                <div class="form-group">
                    <label for="Nombre" class="control-label col-md-3 ">Cantidad</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="MuebleCantidad" placeholder="Canttidad" required>
                    </div>
                </div>
				<div class="form-group">
					<label for="Nombre" class="control-label col-md-3">Tipo</label>
					<div class="col-md-9">
						<select id="MuebleTipo" class="form-control">
							<option value="Salas">Salas</option>
							<option value="Comedor">Comedor</option>
							<option value="Oficinas">Oficinas</option>
							<option value="Banos">Baños</option>
							<option value="Mascotas">Mascotas</option>
							<option value="Recamara">Recamaras</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Nombre" class="control-label col-md-4">Descripcion</label>
					<div class="col-md-8">
						<textarea class="form-control" id="MuebleDescripcion" required cols="40" rows="5"></textarea>
					</div>
				</div>
			</div>
		</form>
			<div class="col-md-6">
				
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Subir imagen y guardar" id="upload">
				</div>
				<div id="gallery"></div>
			</div>
<style type="text/css" media="screen">
    #gallery{
        list-style:none;
        margin:20px 0 0 0;
        padding:0;
    }
    #gallery li{
        display:block;
        float:left;
        width:155px;
        height:200px;
        background:#9AF099;
        border:1px solid #093;
        text-align:center;
        padding:6px 0;
        margin:5px 0 5px 14px;
    }
    #gallery li img{
        width:145px;
        height:140px;
    }
	</style>