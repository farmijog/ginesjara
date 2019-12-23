<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache"><head>
   <?php include('./inc/header.php'); ?>
<div id="Main">
<div id="WebPage">
  <head>
	<link rel="stylesheet" href="css/tablita.css" type="text/css">
    <script src="js/push.min.js"></script>
  <title>Información cliente</title>



  </head>
	<div class="align">
<div class="content">
			<h1>Metodo de pago</h1>
			<p>
			Estimado usuario, usted aqui debe seleccionar el metodo de pago de estime conveniente.
			</p>
			<form name="frmRestablecer" id="frmRestablecer" class="form-horizontal"  enctype="multipart/form-data">

				<div class="ContenidoTable" >
					<div style="background: #dddddd; border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;" class="table-bordered">
						<h4 class="tabletitle"><span class="nombreTabla">Seleccionar metodo de pago</span></h4>

            <div class="IntTable" >
			 	 
              <div class="control-group">
			  <table border="0" style="text-align:center">
			  <tr>
			  <td>
			  			  <img src="img/icono-paypal-tarjetas.png" width="300px">
			  </td>
			  </tr>
			  <tr>
			  <td>
   <?php
     include("connection.php");
    require_once("sesion.class.php");

    @$sesion = new sesion();
    @$usuario = $sesion->get("email");
	
	date_default_timezone_set("Chile/Continental");
     $Consulta = "select * from ordencomprada where emailcomprador='$usuario' and estado='0' and creada='".date("Y-m-d H:i:s")."'";

     $Buscar = $ConexionBD->query($Consulta);

     while ($ListPro = $Buscar->fetch_assoc())
     {
   ?>           
             <a href="processpayv2.php?id=<?php echo base64_encode($ListPro['product_id']); ?>" class="btn btn-primary">Pagar<i class="glyphicon glyphicon-menu-right"></a>
    <?php
            }
      ?>			  
			  </td>
			  </tr>
			  </table>


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
