<?php 
	$token = $_GET['token'];
	$idusuario = $_GET['idusuario'];
	
	$conexion = new mysqli('localhost', 'root', '', 'ginesbd');

	$sql = "SELECT * FROM tblconfirmacion WHERE Token = '$token'";
	$resultado = $conexion->query($sql);
	
	if( $resultado->num_rows > 0 ){
		$usuario = $resultado->fetch_assoc();

		if( sha1($usuario['ID']) == $idusuario ){
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
			<h1>Confirmacion</h1>
			<p></p>		            
			<form name="Formulario" id="Formulario" class="form-horizontal" method="post" enctype="multipart/form-data" action="conf2.php">
				
				<div class="ContenidoTable">
					<div>
						<h4 class="tabletitle"><span class="nombreTabla">Confirmar registro</span></h4>
		
     <div class="container" role="main">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form action="conf2.php" method="post">
          <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
              <input type="hidden" name="token" value="<?php echo $token ?>">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
			  <input type="hidden" name="verifi" id="verifi" value="SI">
              <div class="form-group"> <br><br><br>
                <center><input type="submit" class="btn btn-success" value="Confirmar registro" ></center><br><br>
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
			header('Location:reg.php');
		}
	}
	else{
		header('Location:reg.php');
	}
?>
   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>