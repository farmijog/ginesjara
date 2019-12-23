<?php
	require_once("sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("email");	
	if( $usuario == false )
	{	
		header("Location: ../index.php");
	}
	else 
	{
		$usuario = $sesion->get("email");	
		$sesion->termina_sesion();	
		header("location: ../index.php");
	}
?>