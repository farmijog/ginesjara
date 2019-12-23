<?php
	include('connection.php');

	$IDpro = $_REQUEST['IDpro2'];
	$numerousuario = $_POST["txtusernum"];
	$Encargado = $_POST["txtnombre"];
	$Respuesta = $_POST["txtrespuesta"];
	$PrecioTotal = $_POST["txtprecio"];
	$Currency = $_POST["txtCurrency"];
	$Coti = $_POST["txtcoti"];
	//$Creada= $_POST["cliente_email"];
    $Estado = $_POST["txtvalidad"];;
	$emailco = $_POST["txtemail"];

	$Consulta = "insert into respuestaorden(userNumber,autorizador,respuesta,preciototal,creada,estado,emailcotizador,product_currency,nombrecoti)values
('$numerousuario','$Encargado','$Respuesta','$PrecioTotal','".date("Y-m-d H:i:s")."','$Estado','$emailco','$Currency','$Coti')";
	$Buscar = $ConexionBD -> query($Consulta);

	$Consulta1 = "Update orden Set estado='0', modificada=now() where id='$IDpro'";

	$Buscar1=$ConexionBD ->query($Consulta1);

	if($Buscar)
	{
			header("Location:listado_cotizaciones.php");
	}
	else
	{
		echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
	}
?>
