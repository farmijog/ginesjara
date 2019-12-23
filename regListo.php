<div id="Main">
<div id="WebPage">

	<div class="align">
			<label style="color:green">Usuario registrado con exito!</label>
			<h1>Registro de Cliente</h1>
						
			<form name="Formulario" id="Formulario" class="form-horizontal" method="post" enctype="multipart/form-data"action="reguser.php">
			
			<input name="accion" id="accion" type="hidden" value="ADD">
			<input name="cliente_codigo" id="cliente_codigo" type="hidden" value="">
			<input name="cliente_validado" id="cliente_validado" type="hidden" value="">
			<input name="cliente_archivo1" id="cliente_archivo1" type="hidden" value="">
			<input name="cliente_archivo2" id="cliente_archivo2" type="hidden" value="">
			
			    	
			<div class="ContenidoTable">
				<div style="background: #dddddd; border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;" class="table-bordered">
					<h4 class="tabletitle"><span class="nombreTabla">Datos del Cliente</span></h4>
		    		
						<div class="IntTable">
							
				            <div class="control-group">
				              <label class="control-label" for="cliente_rut">RUT</label>
				              <div class="controls">
				                <input type="text" id="cliente_rut" name="cliente_rut" placeholder="Ingrese su RUT" class="span2 :required :only_on_blur" maxlength="10" value=""> <span id="cliente_rut_error"></span> <span class="help-inline">(*)</span>
				              </div>
				            </div>	
				            
				            <div class="control-group">
				              <label class="control-label" for="">Nombres</label>
				              <div class="controls">
				                <input type="text" id="cliente_nombres" name="cliente_nombres" placeholder="Ingrese sus Nombres" class="span4 :required :only_on_blur" maxlength="60" value="">	<span class="help-inline">(*)</span> 				                
				              </div>
				            </div>	

				            <div class="control-group">
				              <label class="control-label" for="cliente_apepat">Apellido Paterno</label>
				              <div class="controls">
				                <input type="text" id="cliente_apepat" name="cliente_apepat" placeholder="Ingrese Apellido Paterno" class="span4 :required :only_on_blur" maxlength="60" value=""> <span class="help-inline">(*)</span>					                
				              </div>
				            </div>

				            <div class="control-group">
				              <label class="control-label" for="cliente_apemat">Apellido Materno</label>
				              <div class="controls">
				                <input type="text" id="cliente_apemat" name="cliente_apemat" placeholder="Ingrese Apellido Materno" class="span4 :required :only_on_blur" maxlength="60" value=""> <span class="help-inline">(*)</span>
				              </div>
				            </div>
				            				            				            
				            <div class="control-group">
				              <label class="control-label" for="cliente_email">Su Correo Electrónico</label>
				              <div class="controls">
				                <input type="text" id="cliente_email" name="cliente_email" placeholder="Ingrese su Correo Electrónico" class="span4 :required :email :only_on_blur" maxlength="120" onblur="valida_cliente_email()" value=""> <span class="help-inline">(*)</span> <img id="loadingmail" style="display:none" src="https://www.rhona.cl/css/images/loading.gif" align="absmiddle" alt="Cargando...">				                
				              </div>
				            </div>

				            <div class="control-group">
				              <label class="control-label" for="cliente_cel">Telefono</label>
				              <div class="controls">	
				                <input type="text" id="cliente_cel" name="cliente_cel" placeholder="Ingrese su Telefono" class="span2 :required :only_on_blur" maxlength="10" value=""> <span id="cliente_rut_error"></span> <span class="help-inline">(*)</span>
				              </div>
				            </div>								

				            <div id="resultado-valida-email" class="control-group"></div>	
				            
				            <hr class="panel">	
				            
				            <div class="control-group">
				              <label class="control-label" for="cliente_fecnac" for="">Fecha Nacimiento</label>
				              <div class="controls">
				                <input type="text" id="cliente_fecnac" name="cliente_fecnac" placeholder="01/01/1990" class="span2 :required :only_on_blur" maxlength="10" value="">					                
				              </div>
				            </div>					            
				            <div class="control-group">
		    	                <label class="control-label" for="cliente_sexo">Sexo</label>
		    	                <div class="controls">
		        	            	<input name="cliente_sexo" id="cliente_sexo" type="radio" value="Masculino" style="border:none" checked=""> Masculino 
									<input name="cliente_sexo" id="cliente_sexo" type="radio" value="Femenino" style="border:none"> Femenino		
		    	                </div>		            
				            </div>		
				                        										           
				            <hr class="panel">												           

				            <div class="control-group">
				              <label class="control-label" for="cliente_clave">Contraseña</label>
				              <div class="controls">
				                <input type="password" id="cliente_clave" name="cliente_clave" placeholder="Ingrese Contraseña" class="span2 :required :only_on_blur" maxlength="12" value=""> <span class="help-inline">(*)</span>			                
				              </div>
				            </div>				           

				            <div class="control-group">
				              <label class="control-label">Repetir Contraseña</label>
				              <div class="controls">
				                <input type="password" id="cliente_clave2" name="cliente_clave2" placeholder="Repita Contraseña" class="span2 :required :same_as;cliente_clave :only_on_blur" maxlength="12" value="">	<span class="help-inline">(*)</span>				                
				              </div>
				            </div>
						</div>						
				</div>
			</div>	
            		
						
			
			<div class="ContenidoTable">
				<div style="background: #dddddd; border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;" class="table-bordered">
					<div class="IntTable">
									    	
			            <div class="control-group">
			              
			              
			            </div>	
			            <hr class="panel">
					    		    				
						
						<div id="enviarbtn" class="control-group">
			                <label class="control-label" for="enviar" style="margin-left: 75px"> </label>
			                <div class="controls">
			                	<button type="submit" class="btn btn-success">Registrarme!</button> 
			                	<span class="help-block" style="margin-left: 75px">(*) Campos Obligatorios.</span>
			                </div>
						</div>
							 <div id="mensaje">
          
							</div>	
			            <div id="resultado-valida-email-btn" class="control-group">
			            </div>							
					</div>		
				 	
				</div>&#8203;&#8203;&#8203;
			</div>			

			</form>
			
		</div>
	</div>		
					
	
</div>

</div>
</div>	
</div>	

   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>