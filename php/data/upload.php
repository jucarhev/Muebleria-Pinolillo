<?php
include "../lib/lib.php";
$obj= new lib();
$id=$_GET['id'];
$user=$_GET['user'];
$sql="";
    foreach($_FILES['images']['error'] as $key => $error){
        if($error == UPLOAD_ERR_OK){
            $name = $_FILES['images']['name'][$key];
            $userimage=$user."-".$name;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../../photos/' . $userimage);
            $sql="INSERT INTO comprobante(nombre_foto,user,idpedido) values('".$userimage."','".$user."','".$id."');";
        }
    }
    echo $obj->procesaCUD($sql);
?>