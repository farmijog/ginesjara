
<?php
$EEmail = $_POST['Email'];
$CClave = $_POST['Clave'];
$RRepClave = $_POST['RepClave'];
$con = mysqli_connect("localhost","root","","ginesbd") or die("Sin conexion");
$sql = "UPDATE usuarios SET Clave = '".md5($CClave)."' , RepClave = '".md5($RRepClave)."' where Email = '$EEmail'";				
$res = mysqli_query($con,$sql);
//echo json_encode($res);
//echo "Modificado correctamente";
mysqli_close($con);
?>
<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache"><head>
   <?php include('./inc/header.php'); ?>
<div id="Main">
<div id="WebPage">
	<div class="align">
<div class="content">
			<h1>Cambiar Contraseña</h1>
			<p>
			Estimado usuario, si usted ya está registrado como cliente en nuestra tienda puede cambiar su contraseña aqui, ingresando su nombre y su nueva clave.
			</p>
			<form name="frmRestablecer" id="frmRestablecer" class="form-horizontal" method="post" enctype="multipart/form-data" action="modificar.php">

				<div class="ContenidoTable" >
					<div style="background: #dddddd; border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;" class="table-bordered">
						<h4 class="tabletitle"><span class="nombreTabla">Cambiar mi Contraseña</span></h4>

            <div class="IntTable" >
                      <div class="table-bordered">

                          <form align="center" action="modificar.php" method="post" >
                            <br><br>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input  type="text" align="center" name="Email" placeholder="Ingrese su email">
                <br><br>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="Clave" placeholder="Nueva contraseña">
                <br><br>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="RepClave" placeholder="Repita su contraseña">
                <br><br>

              </form>
                      </div>

              <div class="control-group">
                        <label class="control-label" for="enviar"> </label>
                        <div class="controls">
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">Modificar</button>
                        </div>
                        <div id="mensaje"><label style="color:green"><center>Modificado correctamente</center></label>

      </div>
              </div>
            </div>
					</div>
				</div>
			</form>
		</div>
</div>

</div>
</div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>