<div class="panel panel-default">
	<div class="panel-heading">
		<p class="h4">Generador de encuestas</p>
	</div>
	<form>
		<div class="panel-body form-horizontal">
			<?php 
			require "../lib/lib.php";
			$obj=new Lib();

			$dato=$_POST['x'];
			$id=$_POST['y'];
			if ($dato=="0") { ?>
				<div class="form-group">
					<label for="Nencuesta" class="col-sm-3 control-label">Nombre encuesta</label>
					<div class="col-sm-9">
	      				<input type="text" class="form-control" id="Nencuesta" placeholder="Nombre encuesta">
	    			</div>
	    		</div>
	    		<div class="form-group">
	    			<div class="col-sm-offset-3 col-sm-9">
	    				<button type="submit" class="btn btn-default" onclick="guardarEncuesta();return false">
	    					Siguiente <span class="glyphicon glyphicon-menu-right"></span>
	    				</button>
	    			</div>
	    		</div>
			<?php
			}if ($dato=="1") { ?>
				<div class="form-group">
					<label for="opciones" class="col-sm-3 control-label">Opciones</label>
					<div class="col-sm-9">
	      				<input type="text" class="form-control" id="Oencuesta" placeholder="Nombre opcion">
	    			</div>
				</div>
				<div class="form-group">
	    			<div class="col-sm-offset-3 col-sm-9">
	    				<button type="submit" class="btn btn-default" onclick="GuardaOpcionEncuesta(<?php echo $id; ?>);return false">
	    					Nueva opcion <span class="glyphicon glyphicon-plus"></span>
	    				</button>
	    				<button type="submit" class="btn btn-default" onclick="SiguienteOpcion(<?php echo $id; ?>);return false">
	    					Siguiente <span class="glyphicon glyphicon-menu-right"></span>
	    				</button>
	    			</div>
	    		</div>
			<?php
			}if ($dato=="2") { ?>
				<div class="form-group">
					<label for="opciones" class="col-sm-3 control-label">Escribe tu pregunta</label>
					<div class="col-sm-9">
	      				<input type="text" class="form-control" id="Pencuesta" placeholder="Nueva pregunta">
	    			</div>
				</div>
				<div class="form-group">
	    			<div class="col-sm-offset-3 col-sm-9">
	    				<button type="submit" class="btn btn-default" onclick="GuardaPreguntaEncuesta_1(<?php echo $id; ?>);return false">
	    					Siguiente pregunta <span class="glyphicon glyphicon-menu-right"></span>
	    				</button>
	    				<button type="submit" class="btn btn-default" onclick="encuestast(0,0);return false">
	    					Terminar encuesta <span class="glyphicon glyphicon-flag"></span>
	    				</button>
	    			</div>
	    		</div>
			<?php
			}
			?>  
		</div>
		<div class="panel-footer">
			<button type="submit" class="btn btn-default" onclick="VerEncuesta(<?php echo $id; ?>);return false"  data-toggle='modal' data-target='#ventana1'>
				Vista preliminar 
				<span class="glyphicon glyphicon-search"></span>
			</button>
			<button type="submit" class="btn btn-default" onclick="ListarEncuestas(0);return false">
				Ver encuestas
				<span class="glyphicon glyphicon-list-alt"></span>
			</button>
		</div>
	</form>
</div>
<div id="mostrar"></div>
