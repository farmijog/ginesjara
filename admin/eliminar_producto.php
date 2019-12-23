<?php
	include('connection.php');

	$IDpro=$_REQUEST['IDrequest'];



    $Consulta = "INSERT INTO productos_backup SELECT * FROM productos WHERE productoCodigo='$IDpro'";

		$Buscar=$ConexionBD->query($Consulta);



		if($Buscar)
		{
			$Consulta2 = "DELETE FROM productos WHERE productoCodigo='$IDpro'";
			$result = $ConexionBD->query($Consulta2);
				header("Location:listado_productos.php");
		}
		else
		{
			echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
		}
?>
