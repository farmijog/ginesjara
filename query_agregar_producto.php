<?php
	include('connection.php');

  $IDpro = $_POST["txtcodigo"];
  $Nombre = $_POST["txtnombre"];
  $Categoria = $_POST["cbocategoria"];
  $Descripcion = $_POST["txtdescripcion"];
  $Precio = $_POST["txtprecio"];
	$check = getimagesize($_FILES["image"]["tmp_name"]);
		if ($check !== false) {
			$image = $_FILES['image']['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));
}

	$Consulta = "Insert into productos(productoCodigo,productoNombre,categoriaID,productoDescripcion,productoPrecio,productoImagen) values('$IDpro','$Nombre','$Categoria','$Descripcion','$Precio','$imgContent')";

	$Buscar = $ConexionBD->query($Consulta);

	if($Buscar){
		header("Location:listado_productos.php");
		echo "Datos Guardados";
		}
		else{

			//echo "Error al guardar" . mysql_error();
			 echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
			}


?>
