<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache"><head>
   <?php include('./inc/header.php'); ?>
   
<div id="Main">
<div id="WebPage">
	<div class="align">	
<div class="content">	
			<h1>Recuperar Contraseña</h1>
			<p>
			Estimado usuario, si usted ya está registrado como cliente en nuestra tienda y ha olvidado su contraseña para ingresar, puede recuperarla ingresado el correo electrónico que ha registrado, una vez validado este le enviaremos la contraseña a su email.
			</p>		            
			<form name="frmRestablecer" id="frmRestablecer" class="form-horizontal" method="post" enctype="multipart/form-data" action="validaremail.php">
				
				<div class="ContenidoTable">
					<div style="background: #dddddd; border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;" class="table-bordered">
						<h4 class="tabletitle"><span class="nombreTabla">Recuperar mi Contraseña</span></h4>
		
							<div class="IntTable">
	
					            				            				            
					            <div class="control-group">
					              <label class="control-label" for="cliente_email">Su Correo Electrónico</label>
					              <div class="controls">
					                <input type="text" id="cliente_email" name="cliente_email" placeholder="Ingrese su Correo Electrónico" class="span4 :required :email :only_on_blur" maxlength="120" value="">					                
					              </div>
					            </div>													           
					            <hr class="panel">												                  				    				
								<hr class="panel">
								<div class="control-group">
					                <label class="control-label" for="enviar"> </label>
					                <div class="controls">
					                	<button type="submit" class="btn btn-success">Recuperar</button> 
					                </div>
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