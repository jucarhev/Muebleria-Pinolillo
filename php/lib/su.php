<?php 
include "lib.php";
$obj=new Lib();
$r="re'---<>'/";
echo test_input($r);
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>