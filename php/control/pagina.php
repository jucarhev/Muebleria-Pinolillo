<?php 
$var1=$_GET['var1'];
$var2=$_GET['var2'];
$var3=$_GET['var3'];

echo $var1.$var2.$var3;

session_start();
$_SESSION['usuario']=$var1;
$_SESSION['carrito']=$var3;
header('Location: ../../user.php');

?>