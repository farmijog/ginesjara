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
			<form name="Formulario" id="Formulario" class="form-horizontal" method="post" enctype="multipart/form-data" action="validaremail.php">
				
				<div class="ContenidoTable">
					<div style="background: #dddddd; border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;" class="table-bordered">
						<h4 class="tabletitle"><span class="nombreTabla">Cambiar contraseña</span></h4>
		
							<div class="IntTable">
	<div class="panel-body">
              <p></p>
              <div class="form-group">
                <label for="password"> Nueva contraseña </label>
                <input type="password" class="form-control" name="password1" id="password1" required="">
              </div>
              <div class="form-group">
                <label for="password2"> Confirmar contraseña </label>
                <input type="password" class="form-control" name="password2" id="password2" required="">
              </div>
              <input type="hidden" name="token" value="<?php echo $token ?>">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
              <div class="form-group">
                  <br>
                <input type="submit" class="btn btn-primary" value="Recuperar contraseña">
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
</div>
   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>