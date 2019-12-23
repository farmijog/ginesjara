<?php
	require_once("sesion.class.php");

	$sesion = new sesion();
	
	if( isset($_POST["iniciar"]) )
	{
		
		$usuario = $_POST["email"];
		$password = md5($_POST["clave"]);
		
		if(validarUsuario($usuario,$password) == true)
		{			
			$sesion->set("email",$usuario);
			
			header("location: principal.php");
		}
	}
	

	function validarUsuario($usuario, $password)
	{
		$conexion = new mysqli("localhost","root","","ginesbd");
		$consulta = "select Clave from usuarios where Email = '$usuario';";
		
		$result = $conexion->query($consulta);
		
		if($result->num_rows > 0)
		{
			$fila = $result->fetch_assoc();
			if( strcmp($password,$fila["Clave"]) == 0 )
				return true;						
			else					
				return false;
		}
		else
				return false;
	}

?>
<head>
    <?php include('./inc/header.php'); ?>
   <link href="css/loginuwu.css" rel="stylesheet" type="text/css"/>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <script src="js/jquery.js" type="text/javascript"></script>
   <script src="js/login1.js" type="text/javascript"></script>
   
<div id="Main">
<div id="WebPage">
	<div class="align">	
<div class="content">	
			<h1>Iniciar Sesión</h1>	            
			<form name="frmRestablecer" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal" >
				<br>
				<br>
				<br>
				<div class="ContenidoTable">
					<div style="background: #dddddd; border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;" class="table-bordered">
						<h4 class="tabletitle"><span class="nombreTabla">Bienvenido</span></h4>
		
							<div class="IntTable">
	
<form name="login">
<div class="login-block">
    <h1 style="font-family: verdana;">Iniciar Sesión</h1>
    <input type="text" value="" name="email" placeholder="Email" />
    <input type="password" value="" name="clave" placeholder="Contraseña"  />
	<center><button type="submit" name ="iniciar" class="btn btn-success">Ingresar</button> </center>
	   
    
</div>
</form>
									        <div id="mensaje">

        </div>
								</div>
							</div>
					</div>
				</div>					        		
			</form>			
		</div>			
</div>

</div>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#frmRestablecer").submit(function(event){
          event.preventDefault();
          $.ajax({
            url:'validaremail.php',
            type:'post',
            dataType:'json',
            data:$("#frmRestablecer").serializeArray()
          }).done(function(respuesta){
            $("#mensaje").html(respuesta.mensaje);
            $("#email").val('');
          });
        });
      });
    </script>
   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>