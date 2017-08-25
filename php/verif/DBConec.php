<?php
	$user="root";
	//coloque entre las comillas la contraseña del servidor
	//ejemplo $pass="contraseña";
	$pass="";
	$base="pinolillo";
	$host="localhost";
	$con=mysql_connect($host,$user,$pass) or die("Error en la conexion");
	mysql_select_db($base,$con) or die("Error en la bd");
?>