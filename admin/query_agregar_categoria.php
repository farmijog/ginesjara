<?php

/*     Consulta SQL para Agregar Categoria    */
	include('connection.php');

  $IDCat = $_POST["txtcodigocat"];
  $NombreCat = $_POST["txtnombrecat"];
	$Consulta = "Insert into categorias(categoriaID,categoriaNombre) values('$IDCat','$NombreCat')";
	$Buscar = $ConexionBD->query($Consulta);

	if($Buscar){
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
		header("Location:agregar_categoria.php?success=true");

		}
		else{

			//echo "Error al guardar" . mysql_error();
			 echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
			}
?>
