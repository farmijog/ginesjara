<?php
	$Servidor="localhost";
	$Usuario="root";
	$Password="";
	$NombreBD="ginesbd";

	$ConexionBD = mysqli_connect($Servidor,$Usuario,$Password,$NombreBD) or die("Error de Conexion: " . mysqli_connect_error());
?>
