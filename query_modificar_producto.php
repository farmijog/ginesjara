<?php
	include('connection.php');

	$IDpro = $_REQUEST['IDpro2'];

		//No se reciben los datos porque no se ocuparan
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

	$Consulta = "Update productos Set productoNombre='$Nombre',categoriaID='$Categoria',productoDescripcion='$Descripcion',productoPrecio='$Precio',productoImagen='$imgContent' where productoCodigo='$IDpro'";

	$Buscar=$ConexionBD ->query($Consulta);

	if($Buscar)
	{
			header("Location:listado_productos.php");
	}
	else
	{

		echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
				}








?>
