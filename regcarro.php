<?php
	include('/Productos.php');?>
<center>
<?php
	include('connection.php');
	$IID = $_POST["id"];
	$MMarca = $_POST["marca"];
	$NNombre = $_POST["nombrepro"]; 	
	$CCodigo = $_POST["codigo"];
	$VValor= $_POST["precio"];

	
	
	$Consulta = "insert into carro(ID,Marca,Nombre,Codigo,Valor)values
	('$IID','$MMarca','$NNombre','$CCodigo','$VValor')";
	$Buscar = $ConexionBD -> query($Consulta);

?>
    </center>
</body>
</html>