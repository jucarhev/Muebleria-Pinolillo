<?php 
$arreglo=$_POST['arreglo'];
$user=$_POST['user'];
include "../lib/lib.php";
$obj=new Lib();

$piezas = explode(",", $arreglo);
$result=array_count_values($piezas);
$tabla='pedido';

$id_user=$obj->un_dato('id','SELECT * FROM cliente where email="'.$user.'";');

$datos=array('idusuario'=>$id_user,'status'=>'pendiente');
$id_pedido=$obj->save_return_id($tabla,$datos);


foreach ($result as $key => $value) {
	$mueble=$obj->un_dato('mueble','SELECT * FROM muebles where id='.$key.';');
	$precio=$obj->un_dato('precio','SELECT * FROM muebles where id='.$key.';');
	$resultado=$precio*$value;
	$query="INSERT INTO factura(idpedido,idproducto,mueble,cantidad,total) values($id_pedido,$key,'$mueble',$value,$resultado);";

	echo $result=$obj->procesaCUD($query);

}
?>