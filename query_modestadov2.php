<?php
	include('connection.php');

		$uuserNumber = $_POST['usernum'];
		$prodid = $_POST['prodnum'];
		$pretol = $_POST['pretoto'];


	$Consulta = "UPDATE ordencomprada SET estado ='1' where userNumber = '$uuserNumber' and product_id ='$prodid'";
	$Consulta1 = "UPDATE orden_cmpdir SET estado ='1' where userNumber = '$uuserNumber' and precio_total ='$pretol'";

	$Buscar=$ConexionBD ->query($Consulta);
	$Buscar1=$ConexionBD ->query($Consulta1);

	if($Buscar)
	{
			header("Location:compraspagadas.php");
	}
	else
	{

		echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
				}


?>
