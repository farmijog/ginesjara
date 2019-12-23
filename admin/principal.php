<?php
	require_once("sesion.class.php");

	$sesion = new sesion();
	$usuario = $sesion->get("email");
	///////////////////
	if( $usuario == 'wikitareauwu@gmail.com'){
		header("Location: adminpanel.php");
	}

	if( $usuario != 'wikitareauwu@gmail.com'){
		header("Location: ./login.php");
	}
	///////////////////
	if( $usuario == false )
	{
		header("Location: ./login.php");
	}
	else
	{
	?>
<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache"><head>
   <?php include('./inc/header.php');
   	?>
	<body>
	<h1>Hola:  <?php echo $sesion->get("email"); ?> </h1> <a href="cerrarsesion.php"> Cerrar Sesion </a>
	<p> </p>
   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>
	<?php
	}
?>
