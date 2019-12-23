<?php
if(!isset($_REQUEST['id'])){
    header("Location: Productos.php");
}
?>

<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache">
 <?php include('./inc/header.php'); ?>

 <style>
     .container{width: 100%;padding: 50px;}
     p{color: #34a853;font-size: 18px;}
     </style>

     <div id="Main">
     <div id="WebPage">
     <div class="align">

       <div class="container">
           <h1>Estado de Orden</h1>
           
		   <p>
<?php
	require_once("sesion.class.php");

	@$sesion = new sesion();
	@$usuario = $sesion->get("email");

	if( $usuario == true ){
	   include("connection.php");
   $Consulta = "Select * from usuarios where Email='$usuario'";
   $Buscar = $ConexionBD->query($Consulta);

	while ($listinfo = $Buscar->fetch_assoc()){
		
	}	
?>	
		   Sr/Sra :<?php echo $listinfo['Nombres']; ?><br><br> 
		   <?php
	}?>
¡Gracias por visitarnos y hacer su cotizacion !<br>
Su orden fue enviada exitosamente.<br>
Estamos contentos de que haya encontrado lo que estaba buscando.
<br>Nuestro objetivo es que siempre esté satisfecho, <br>así que le avisaremos cuando este lista su cotizacion. 
<br>Esperamos volver recibir cotizaciones de nuevo. ¡Que tenga un gran día!

<br>Atentamente,

<br><br><br><br> Tableros Gines Jara
		   </p><p style="color:black"> Numero de su orden: <?php echo $_GET['id']; ?></p><br><br>
       </div>

    </div>
   </div>
   </div>

   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>
