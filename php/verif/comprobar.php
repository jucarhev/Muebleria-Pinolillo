<?php
include ("DBConec.php");
$UserName=$_POST["UserName"];
$UserPass=$_POST["UserPass"];
$result=mysql_query("SELECT * FROM cliente WHERE email='$UserName';");
if ($row=mysql_fetch_array($result)) 
{
	if ($row["password"]==$UserPass) {
			session_start();
			$_SESSION['usuario']=$UserName;
			header("Location: ../../user.php");
   }
    else
   {
    ?>
     <script languaje="javascript">
      alert("Usuario o password incorrecta");
      location.href = "../../index.php";
     </script>
    <?php
   }
}
else
{
?>
 <script languaje="javascript">
  alert("Usuario o password incorrecta");
  location.href = "../../index.php";
 </script>
<?php       
}
mysql_free_result($result);
mysql_close();
?>