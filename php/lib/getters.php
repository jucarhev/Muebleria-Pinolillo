<?php 
include "lib.php";
$obj=new Lib();

$valor=$_POST['valor'];
if ($valor==1) {
	$name=$_POST['name'];
	$apes=$_POST['apes'];
	$tel=$_POST['tel'];
	$Email=$_POST['Email'];
	$dir=$_POST['dir'];
	$cp=$_POST['cp'];
	$est=$_POST['est'];
	$mun=$_POST['mun'];
	$Pass=$_POST['Pass'];

	$cadena = array(
		'nombre' => $name, 
		'apellidos' => $apes, 
		'telefono' => $tel, 
		'email' => $Email, 
		'direccion' => $dir,
		'cp' => $cp,
		'municipio' => $mun,
		'estado' => $est,
		'password' => $Pass);
	echo $obj->guardarRegistros($cadena,'cliente','');
}elseif ($valor==2) {
	$MNombre=$_POST['MNombre'];
	$MPrecio=$_POST['MPrecio'];
	$MTipo=$_POST['MTipo'];
	$MCantidad=$_POST['MCantidad'];
	$MDescripcion=$_POST['MDescripcion'];
	$x=$_POST['x'];

	

	$cadena = array('mueble' => $MNombre, 
	'cantidad'=>$MCantidad,
	'precio' => $MPrecio, 
	'descripcion' => $MDescripcion,
	'categoria' => $MTipo);

	echo $obj->guardarRegistros($cadena,"muebles","");
}elseif ($valor==3) {
	$id=$_POST['id'];
	$sql="DELETE FROM cliente where id='".$id."'";
	$respuesta=$obj->procesaCUD($sql);
	if (!$respuesta) {
		echo  "Error";
	}else{
		echo  "Exito";
	}
}elseif ($valor==4){
	$id=$_POST['x'];

	$query="SELECT * FROM muebles where id='".$id."'";
	$imagen=$obj->un_dato('imagen',$query);

	$sql="DELETE FROM muebles where id='".$id."'";
	$respuesta=$obj->procesaCUD($sql);
	if (!$respuesta) {
		echo  "Error";
	}else{
		echo  "Exito";
	}
	
	$sql2="DELETE FROM fotos where nombre_foto='".$imagen."'";
	$respuesta=$obj->procesaCUD($sql2);
	if(unlink('../../photos/'.$imagen)){}else{echo "ocurrio un error";}

}elseif ($valor==5) {
	$nombre=$_POST['nombre'];
	$hoy = date("d-m-Y");
	$datos=array('nombre'=> $nombre,'fecha'=>$hoy);
	echo $obj->save_return_id('encuesta',$datos);
}elseif ($valor==6) {
	$opcion=$_POST['opcion'];
	$id=$_POST['id'];
	$datos=array('opcion'=> $opcion,'idencuesta'=>$id);
	$obj->guardarRegistros($datos,'opciones','');
}elseif ($valor==7) {
	$pregunta=$_POST['pregunta'];
	$id=$_POST['id'];
	$datos=array('pregunta'=> $pregunta,'idencuesta'=>$id);
	$obj->guardarRegistros($datos,'pregunta','');
}elseif ($valor==8) {
	$id=$_POST['id'];
	$r=$_POST['r'];
	$user=$_POST['user'];
	$gri=explode('/', $r);
	$buscaO=$gri[1];
	$query1='SELECT * from opciones where id='.$buscaO.';';
	$opcion=$obj->un_dato('opcion',$query1);

	$datos=array('idencuesta'=>$id,'pregunta'=>$gri[0],'opcion'=>$opcion,'user'=>$user);
	echo $obj->guardarRegistros($datos,'cuestion','');
}elseif ($valor==9) {
	$id=$_POST['id'];
	$sql="DELETE FROM pedido where id='".$id."'";
	$respuesta=$obj->procesaCUD($sql);
	if (!$respuesta) {
		echo  "Error";
	}else{
		$sql="DELETE FROM producto where idpedido='".$id."'";
		$respuesta=$obj->procesaCUD($sql);
		if (!$respuesta) {
			echo  "Error";
		}else{
			echo  "Exito";
		}
	}
}elseif ($valor==10) {
	$id=$_POST['id'];
	$data = array('status' =>'terminado');
	$obj->actualizar_datos('pedido',$data,'id='.$id);
}
?>