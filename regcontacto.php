   <?php include('./inc/header.php'); 	?>
<center>
<?php
	include('connection.php');
	$NNombre = $_POST["nombreSolicitante"];
	$EEmail = $_POST["emailSolicitante"];
	$RRut = $_POST["rut"]; 	
	$TTelefono = $_POST["telefono"];
	$DDireccion= $_POST["direccion"];
    $CCiudad = $_POST["ciudad"];
	$EEmpresa = $_POST["empresa-yo-razon-social"];
	$SSugerencia = $_POST["sugerencia-consulta-comentario"]; 	
	
	
	
	$Consulta = "insert into contacto(Nombre,Email,RUT,Telefono,Direccion,Ciudad,Empresa,Consulta)values
	('$NNombre','$EEmail','$RRut','$TTelefono','$DDireccion','$CCiudad','$EEmpresa','$SSugerencia')";
	$Buscar = $ConexionBD -> query($Consulta);
?>

   <?php include('./contactoListo.php'); ?>
  <?php include('./enviocorreocontacto.php'); ?>

   
    </center>
</body>
</html>