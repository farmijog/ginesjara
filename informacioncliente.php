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
			<h1>Información</h1>
			<p>
			Estimado usuario, usted aqui puede ver su información de manera clara.
			</p>
			<form name="frmRestablecer" id="frmRestablecer" class="form-horizontal"  enctype="multipart/form-data">

				<div class="ContenidoTable" >
					<div style="background: #dddddd; border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;" class="table-bordered">
						<h4 class="tabletitle"><span class="nombreTabla">Información del cliente</span></h4>

            <div class="IntTable" >
			<table class="tablauwu">
			 <?php
require_once("sesion.class.php");
	
	@$sesion = new sesion();
	@$usuario = $sesion->get("email");
	
   if( $usuario == true ){
   include("connection.php");
   $Consulta = "Select Rut, Nombres, ApPaterno, ApMaterno, Email, Telefono, FechNaci from usuarios where Email='$usuario'";
   $Buscar = $ConexionBD->query($Consulta);

   while ($listinfo = $Buscar->fetch_assoc()){
 ?>
<tbody>
<tr>
<td><label>Rut</label></td>
<td><label name="" id=""><?php echo $listinfo['Rut']; ?></label></td>
</tr>
<tr>
<td><label>Nombre</label></td>
<td><label name="" id=""><?php echo $listinfo['Nombres']; ?></label></td>
</tr>
<tr>
<td><label>Apellido Paterno</label></td>
<td><label name="" id=""><?php echo $listinfo['ApPaterno']; ?></label></td>
</tr>
<tr>
<td><label>Apellido Materno</label></td>
<td><label name="" id=""><?php echo $listinfo['ApMaterno']; ?></label></td>
</tr>
<tr>
<td><label>Email</label></td>
<td><label name="" id=""><?php echo $listinfo['Email']; ?></label></td>
</tr>
<tr>
<td><label>Telefono</label></td>
<td><label name="" id=""><?php echo $listinfo['Telefono']; ?></label></td>
</tr>
<tr>
<td><label>Fecha de Nacimiento</label></td>
<td><label name="" id=""><?php echo $listinfo['FechNaci']; ?></label></td>
</tr>
</tbody>
</table>
<?php
   }	
?>	
<?php
   }else{
	   ?>
<center><h2>ERROR AL MOSTRAR INFORMACION</h2></center>   
	   <?php
	  
   }	   
?>				 
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

   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>
