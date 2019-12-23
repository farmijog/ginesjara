<?php
	include('connection.php');

	$IDpro=$_REQUEST['IDrequest'];



    $Consulta = "INSERT INTO productos SELECT * FROM productos_backup WHERE productoCodigo_backup='$IDpro'";

		$Buscar=$ConexionBD->query($Consulta);



		if($Buscar)
		{
			$Consulta2 = "DELETE FROM productos_backup WHERE productoCodigo_backup='$IDpro'";
			$result = $ConexionBD->query($Consulta2);
				header("Location:listado_productos.php");
		}
		else
		{
			echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
		}
?>
