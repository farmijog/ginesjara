<?php
	include('connection.php');

	$IDpro=$_REQUEST['IDrequest'];




		$Consulta = "Delete From usuarios where userNumber='$IDpro'";
		$Buscar=$ConexionBD->query($Consulta);



		if($Buscar)
		{
				header("Location:listadoUsuarios.php");
		}
		else
		{
			echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
		}
?>
