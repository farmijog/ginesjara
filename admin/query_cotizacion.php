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
	$valser = $_POST["valorservicio"];
	$totalfinal = $valser+$PrecioTotal;
	$idorden = $_POST["txtidorden"];
	date_default_timezone_set("Chile/Continental");

	$Consulta = "insert into respuestaorden(userNumber,autorizador,respuesta,preciototal,creada,estado,emailcotizador,product_currency,nombrecoti,valorservicio)values
('$numerousuario','$Encargado','$Respuesta','$totalfinal','".date("Y-m-d H:i:s")."','$Estado','$emailco','$Currency','$Coti','$valser')";
	$Buscar = $ConexionBD -> query($Consulta);

	$Consulta1 = "Update orden Set estado='0', modificada=now(), valorservicio='$valser' where id='$IDpro'";

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
