<?php 
	$token = $_GET['token'];
	$idusuario = $_GET['idusuario'];
	
	$conexion = new mysqli('localhost', 'root', '', 'ginesbd');

	$sql = "SELECT * FROM tblreseteopass WHERE Token = '$token'";
	$resultado = $conexion->query($sql);
	
	if( $resultado->num_rows > 0 ){
		$usuario = $resultado->fetch_assoc();

		if( sha1($usuario['idusuario']) == $idusuario ){
?>
<!DOCTYPE html>
<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache"><head>
   <?php include('./inc/header.php'); 
   	?>
   
<div id="Main">
<div id="WebPage">

	<div class="align">
		
<div class="align">	
<div class="content">	
			<h1>Cambiar contraseña</h1>
			<p></p>		            
			<form name="Formulario" id="Formulario" class="form-horizontal" method="post" enctype="multipart/form-data" action="cambiarpassword.php">
				
				<div class="ContenidoTable">
					<div>
						<h4 class="tabletitle"><span class="nombreTabla">Cambiar contraseña</span></h4>
		
     <div class="container" role="main">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form action="cambiarpassword.php" method="post">
          <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
              <p></p>
              <div class="form-group">
                <label for="password"></label>
                <center>Nueva contraseña&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" class="form-control" name="password1" id="password1" required></center>
              </div>
              <div class="form-group">
                <label for="password2"></label>
                <center>Confirmar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" class="form-control" name="password2" id="password2"  required></center>
              </div>
              <input type="hidden" name="token" value="<?php echo $token ?>">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
              <div class="form-group"> <br><br><br>
                <center><input type="submit" class="btn btn-success" value="Recuperar contraseña" ></center><br><br>
              </div>
            </div>
          </div>
        </form>  
      </div>
      <div class="col-md-4"></div>

    </div> <!-- /container -->
					</div>
				</div>					        		
			</form>			
		</div>			
</div>				
		</div>
	</div>		
</div>
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<?php
		}
		else{
			header('Location:recuperarclave.php');
		}
	}
	else{
		header('Location:recuperarclave.php');
	}
?>
   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>