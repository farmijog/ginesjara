<?php
	include('connection.php');

	$IDpro = $_REQUEST['IDpro2'];

		//No se reciben los datos porque no se ocuparan
		$RRut = $_POST["txtrut"];
		$NNombres = $_POST["txtnombre"];
		$AApPaterno = $_POST["txtappat"];
		$AApMaterno = $_POST["txtapmat"];
		$EEmail = $_POST["txtemail"];


		$Consulta = "Update usuarios Set Rut='$RRut',Nombres='$NNombres',ApPaterno='$AApPaterno',ApMaterno='$AApMaterno',Email='$EEmail' where userNumber='$IDpro'";

		$Buscar=$ConexionBD ->query($Consulta);

		if($Buscar)
		{
				header("Location:listadoUsuarios.php");
		}
		else
		{

			echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
					}
?>
