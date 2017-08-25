<?php
$cn = mysql_connect("localhost","root","");
mysql_select_db("pinolillo", $cn);

require('fpdf.php');
include "lib.php";
$obj=new Lib();

$DatoUrl=$_GET['id'];
$DatoUrlDecode=base64_decode($DatoUrl);
$ArrayId = explode(",", $DatoUrlDecode);
$Nelementos=count($ArrayId);
$m=1;
$valor=0;


$pdf=new FPDF();
$pdf->addPage();
$pdf->setFont('Arial','',10);
$pdf->Image('../../img/logo-pinolillo.png',10,10,20,10,'png');
$pdf->cell(20,10,'',0);
$pdf->cell(150,10,'Muebles Pinolillo',0);
$pdf->setFont('Arial','',9);
$pdf->cell(50,10,'Fecha: '.date('d-m-Y'), 0);
$pdf->Ln(15);
$pdf->setFont('Arial','B',11);
$pdf->cell(70,8,'',0);
$pdf->cell(100,8,'Listado de productos',0);
$pdf->Ln(8);
$pdf->setFont('Arial','B',8);
$pdf->cell(40,8,'Elementos',0);
$pdf->cell(40,8,'ID',0);
$pdf->cell(40,8,'Mueble',0);
$pdf->cell(40,8,'precio',0);
$pdf->cell(40,8,'categoria',0);
$pdf->Ln(8);
$pdf->setFont('Arial','',8);

for ($i=0; $i < $Nelementos; $i++) { 
    $idProducto=$ArrayId[$i];
    if ($idProducto==0) {
        $pdf->cell(80,8,'No hay registros',0);
    }else{
    $sql="SELECT * FROM muebles WHERE id=$idProducto";
    $datos=$obj->Obtendatos($sql);
    foreach ($datos as $row):
        $pdf->cell(40,8,$m++,0);
        $pdf->cell(40,8,$ArrayId[$i],0);
        $pdf->cell(40,8,$row['mueble'],0);
        $pdf->cell(40,8,$pago=$row['precio'],0);
        $pdf->cell(40,8,$row['categoria'],0);
        $valor=$valor+$pago;
         $pdf->Ln(8);
    endforeach;
    }
}
$pdf->cell(25,8,'Precio total',1);
$pdf->cell(25,8,'$'.$valor.'.00',1);
$pdf->Output();
?>