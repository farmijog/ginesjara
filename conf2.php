<?php 

$veri = $_POST['verifi'];
$idusuario = $_POST['idusuario'];
$token = $_POST['token'];

if( $idusuario != "" && $token != "" && $veri != "" ){
?>
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
			<form name="Formulario" id="Formulario" class="form-horizontal" method="post" enctype="multipart/form-data" action="cambiarpassword.php">
				
				<div class="ContenidoTable">
					<div>
						<h4 class="tabletitle"><span class="nombreTabla">Confirmar registro</span></h4>
		
     <div class="container" role="main">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form action="cambiarpassword.php" method="post">
          <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
              <input type="hidden" name="token" value="<?php echo $token ?>">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">

<?php

	
	$conexion = new mysqli('localhost', 'root', '', 'ginesbd');
	$consulta = " SELECT * FROM tblconfirmacion WHERE Token = '$token' ";

	$resultado = $conexion->query($consulta);
	if( $resultado->num_rows > 0 ){
		$usuario = $resultado->fetch_assoc();
		if( sha1( $usuario['ID'] === $idusuario ) ){
			if( $veri ){
				$sql = "UPDATE usuarios SET Verificado = '$veri' WHERE userNumber = ".$usuario['ID'];
				$resultado = $conexion->query($sql);
				if($resultado){
					$sql = "DELETE FROM tblconfirmacion WHERE Token = '$token';";
					$resultado = $conexion->query( $sql );
				?>
<div class="form-group"> <br><br><br>
                <center><h2 style="color:green">GRACIAS POR CONFIRMAR SU REGISTRO</h2></center><br><center><label style="color:#7c2121">
Ahora podra disfrutar de todos los beneficios que hay en nuestro sitio web,<br>esperamos que sean de su agrado todos los productos que tenemos disponible para ustes. <br>Si gusta algun pedido a especial no olvidar ponerse en conectacto con nosotros.</label></center>
<br><br><center><h5>TBJ</h5></center>
<br><br>
				<?php
				}
				else{
				?>
					<label style="color:red"><center>Ocurrió un error al confirmar registro, intentalo más tarde </center></label>
				<?php
				}
			}
			else{
			?>
			<label style="color:red"><center>Ocurrió un error al confirmar registro</center></label>
			<?php
			}

		}
		else{
?>
			<label style="color:red"><center>El token no es válido</center></label>
<?php
		}	
	}
	else{
?>
			<label style="color:red"><center>El token no es válido</center></label>
<?php
	}
	?>
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
   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>
<?php
}
else{
	header('Location:index.php');
}
?>
