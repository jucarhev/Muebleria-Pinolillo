<?php
$cn = mysql_connect("localhost","root","root");
mysql_select_db("pinolillo", $cn);
if(@$_GET['action'] == 'listFotos'){
    
}else
{
    $destino = "../../photos/";
    if(isset($_FILES['image'])){
 
        $nombre = $_FILES['image']['name'];
        $temp   = $_FILES['image']['tmp_name'];
 	$aleatorio=rand(10000000,20000000);
        // subir imagen al servidor
        if(move_uploaded_file($temp, $destino.$nombre))
        {

            $query = mysql_query("INSERT INTO fotos VALUES('','".$nombre."','".$aleatorio."')" ,$cn);
        }
 
        echo  '<li>
                <img src="photos/'.$nombre.'" />
                <span>'.$nombre.'</span><br>
            </li>';
        echo "<script>";
		echo "MiFuncionJS(".$aleatorio.");";
		echo "</script>";
    }
}
?>