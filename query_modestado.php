<?php
	include('connection.php');

		$uuserNumber = $_POST['usernum'];
		$prodid = $_POST['prodnum'];


	$Consulta = "UPDATE respuestaorden SET estado ='1' where userNumber = '$uuserNumber' and product_id ='$prodid'";

	$Buscar=$ConexionBD ->query($Consulta);

	if($Buscar)
	{
			header("Location:pedidospagados.php");
	}
	else
	{

		echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
				}


?>
