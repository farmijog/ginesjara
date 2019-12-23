	<?php
	function generarLinkTemporal($idusuario, $username){

		$cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
		$token = sha1($cadena);
		
		$conexion = new mysqli('localhost', 'root', '', 'ginesbd');

		$sql = "INSERT INTO tblconfirmacion (ID, Nombre, Token, Creado) VALUES($idusuario,'$username','$token',NOW());";

		$resultado = $conexion->query($sql);
		if($resultado){
			$enlace = $_SERVER["SERVER_NAME"].'/PROYECTO/confirmar.php?idusuario='.sha1($idusuario).'&token='.$token;
			return $enlace;
		}
		else
			return FALSE;
	}

	function enviarEmail( $email, $link ){

		$mensaje = '<html>
		<head>
 			<title>Confirmar registro</title>
		</head>
		<body>
 			<p>Muchas gracias por registrarse en nuestro sitio web.</p>
 			<p>El siguiente paso para poder utilizar nuestra pagina web con todos sus beneficios es la confirmacion.</p>
			<p>Abajo encontraras un link para poder confirmar tu registro.</p>
 			<p>
 				<strong>Enlace para confirmar su regitro</strong><br>
 				<a href="'.$link.'"> Confirmar </a>
 			</p>
		</body>
		</html>';

		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$cabeceras .= 'From: Tableros Gines Jara <tbj@gines.cl>' . "\r\n";
		
		mail($email, "Confirmar registro", $mensaje, $cabeceras);
	}
	
	$email = $_POST['cliente_email'];
	$respuesta = new stdClass();

	if( $email != "" ){   
   		$conexion = new mysqli('localhost', 'root', '', 'ginesbd');

   		$sql = " SELECT * FROM usuarios WHERE Email = '$email' ";
   		$resultado = $conexion->query($sql);

   		if($resultado->num_rows > 0){
      		$usuario = $resultado->fetch_assoc();
			$linkTemporal = generarLinkTemporal( $usuario['userNumber'], $usuario['Nombres'] );
      		if($linkTemporal){
        		enviarEmail( $email, $linkTemporal );
        		$respuesta->mensaje = '<div	class="alert alert-warning"> Usuario registrado con exito! se le ha enviado un correo para que confirme su registro.</div>';
      		}
   		}
   		else
   			$respuesta->mensaje = '<div class="alert alert-warning"> Error al registrar </div>';
	}
	else
   		$respuesta->mensaje= "Debes introducir el email de la cuenta";
 	echo json_encode( $respuesta );