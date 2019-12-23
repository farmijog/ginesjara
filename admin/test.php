<?php 
	include('connection.php');
	
	$procod = $_POST["numeroprod"];
	
    if(isset($_REQUEST["test"]))
     {
       $Consulta = "update productos set Estado='test' where productoCodigo='$procod'";
	   $Buscar=$ConexionBD ->query($Consulta);
	   		if($Buscar)
		{
				header("Location:listado_productos.php");
		}
		else
		{

			echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
		}
}
?>