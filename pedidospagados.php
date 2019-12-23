<?php
include('functionPAY.php');
include('conexionPAY.php');
abrir_conexion();//Abre la conexion a la base de datos
?>


 

<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache"><head>
   <?php include('./inc/header.php'); ?>.
   

<div id="Main">
<div id="WebPage">
  <head>
	<link rel="stylesheet" href="css/tablita.css" type="text/css">
    <script src="js/push.min.js"></script>
  <title>Pedidos Pagados</title>



  </head>
	<div class="align">
<div class="content">
			<h1>Pedidos Pagados</h1>
			<p>
			Estimado usuario, aqui puede ver los pedidos que usted a pagado anteriormente.
			</p>
			<form name="frmRestablecer" id="frmRestablecer" class="form-horizontal"  enctype="multipart/form-data">

				<div class="ContenidoTable" >
					<div style="background: #dddddd; border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;" class="table-bordered">
						<h4 class="tabletitle"><span class="nombreTabla">Respuesta cotizacion</span></h4>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:black;}
.tg .tg-s268{text-align:left}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>

            <div class="IntTable" >
		<table cellspacing="0" class="tg" cellpadding="0" border="2">
   <thead>
     <tr>
       <th>Nombre Autorizador</th>
       <th>Respuesta</th>
       <th >Precio Total</th>
	   <th style="display: none"></th>
       <!--<th>&nbsp;</th>-->

     </tr>

   </thead>
   <?php
     include("connection.php");
	require_once("sesion.class.php");

	@$sesion = new sesion();
	@$usuario = $sesion->get("email");
	
     $Consulta = "select * from respuestaorden where emailcotizador='$usuario' and estado='1'";

     $Buscar = $ConexionBD->query($Consulta);

     while ($ListPro = $Buscar->fetch_assoc())
     {
   ?>
   <tbody>
     <tr>
       <td style="color: #4C697A;"><?php echo $ListPro['autorizador']; ?></td>
       <td style="color: #4C697A; font-weight: normal;"><?php echo $ListPro['respuesta']; ?></td>
       <td style="color: #4C697A; font-weight: normal;"><?php echo $ListPro['preciototal']; ?></td>
	   <td style="display: none"><input type="hidden" name="uwuaa" class="casillas" size="15" readonly="readonly" value="<?php echo $ListPro['emailcotizador']; ?>"  /></td>
	   <td style="display: none"><input type="hidden" name="product_id" class="casillas" maxlength="5" readonly="readonly" value="<?php echo $ListPro['product_id']; ?>"  /></td>
          
                      
      <td><!--<a href="respuestaAdmin_client.php?IDrequest=<?php //echo $ListPro['id']; ?>" id="btnModform" target="_self">Ver Respuesta</a>--></td>
     </tr>
   </tbody>
   <?php
			}
			?>
  </table>				 
              <div class="control-group">
			  
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>
