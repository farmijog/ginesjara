   <?php include('./inc/header.php'); 	?>
<center>
<?php
	include('connection.php');
	$RRUT = $_POST["cliente_rut"];
	$NNombres = $_POST["cliente_nombres"];
	$AApPaterno = $_POST["cliente_apepat"]; 	
	$AApMaterno = $_POST["cliente_apemat"];
	$EEmail= $_POST["cliente_email"];
    $TTelefono = $_POST["cliente_cel"];
	$FFechNaci = $_POST["cliente_fecnac"];
	$SSexo = $_POST["cliente_sexo"]; 	
	$CClave= $_POST['cliente_clave'];
	$RRepClave= $_POST['cliente_clave2'];
	$UUSerTipo = $_POST["userTipo"];
	$VVerifi = $_POST["userVerifi"];
	
    $sha1Clave = md5($CClave);
	$sha1RRepClave = md5($RRepClave);
	
	
	$Consulta = "insert into usuarios(Rut,Nombres,ApPaterno,ApMaterno,Email,Telefono,FechNaci,Sexo,Clave,RepClave,usertipo,Verificado)values
	('$RRUT','$NNombres','$AApPaterno','$AApMaterno','$EEmail','$TTelefono','$FFechNaci','$SSexo','$sha1Clave','$sha1RRepClave','$UUSerTipo','$VVerifi')";
	$Buscar = $ConexionBD -> query($Consulta);

?>

   <?php include('./regListo.php'); ?>
  <?php include('./confirmacionemail.php'); ?>

   
    </center>
</body>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#Formulario").submit(function(event){
          event.preventDefault();
          $.ajax({
            url:'confirmacionemail.php',
            type:'post',
            dataType:'json',
            data:$("#Formulario").serializeArray()
          }).done(function(respuesta){
            $("#mensaje").html(respuesta.mensaje);
            $("#email").val('');
          });
        });
      });
    </script>
</html>