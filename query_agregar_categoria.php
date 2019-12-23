<?php

/*     Consulta SQL para Agregar Categoria    */
	include('connection.php');

  $IDCat = $_POST["txtcodigocat"];
  $NombreCat = $_POST["txtnombrecat"];
	$Consulta = "Insert into categorias(categoriaID,categoriaNombre) values('$IDCat','$NombreCat')";
	$Buscar = $ConexionBD->query($Consulta);

	if($Buscar){
		header("Location:agregar_categoria.php");
		echo "Datos Guardados";
		}
		else{

			//echo "Error al guardar" . mysql_error();
			 echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
			}
?>
