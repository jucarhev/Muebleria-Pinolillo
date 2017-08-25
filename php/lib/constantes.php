<?php 
/**
* 
*/
class Constantes
{
	var $HOSTNAME="localhost";
	var $USERNAME="root";
	var $USERPASS="lenov35";
	var $BASENAME="pinolillo";
	//------------------------------/
	var $CONEXION="";
	var $CAMPOS=null;
	var $VALORES=null;
	var $WHERE="";
	var $IDVISIBLE=true;
	var $FUNCIONES_JS=null;
	var $TABLA="";
	var $registros_Pagina=10;

	//------------------------------/
	var $error_Conexion="Error al conectarse";
	var $error_Query="Ha ocurrido un error al procesar la informacion";
	var $ejecutar_Query="Operacion exitosa";
	var $exito="Exito";
	
	//------------------------------/
	var $tabla_Clase="table table-striped table-condensed table-hover";
	var $paginacion_Clase="pagination";

	//------------------------------/
	// botones | imagenes | palabras
	var $Tipo_FUNCIONES_JS="imagenes";

	//------------------------------/
	var $tpedido ="";
	var $tcliente="";
	var $tfotos  ="";
	var $tmuebles="";

	var $ver_dato="true";
	var $atributo_dato=" data-toggle='modal' data-target='#ventana'";
	var $atributo_dato1=" data-toggle='modal' data-target='#ventana1'";
	var $funcion_ventana="carga_ventana";
	var $funcion_ventana_edita="carga_ventana";
	var $img_boton_ventana3="img/Reporte_I.png";
	var $img_boton_ventana2="img/delete.png";
	var $img_boton_ventana1="img/edit.png";
	var $img_boton_ventana="img/view.png";
	var $parametro_1="0 ,";

	var $campos=null;
	var $valores=null;

	var $campos2=null;
	var $valores2=null;

	var $retorno_valor="id";
}
?>