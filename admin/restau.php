<?php session_start(); ?>
	<link rel="stylesheet" type="text/css" href="script/bootstrap4/css/bootstrap.min.css">
<?php include('adminheader.php') ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-6">
			<?php
				if(isset($_SESSION['error'])){
					?>
					<div class="alert alert-danger text-center">
						<?php echo $_SESSION['error']; ?>
					</div>
					<?php

					unset($_SESSION['error']);
				}

				if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-success text-center">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php

					unset($_SESSION['success']);
				}
			?>
			<div class="card">
				<div class="card-body">
					<h3><center>Credenciales de autenticacion</center></h3>
					<br>
					<form method="POST" action="script/restore.php" enctype="multipart/form-data">
					<img src="img/credencial.png" class="mx-auto d-block" style="width:30%">
	<!--captasdasdfsdfsdfsdfschaasdasdasdasdasdasdasdasdasdasdawdeqweqweqweqeqweqwe-->
						<div class="form-group row">
					      	<div class="col-sm-9">
					        	<input type="hidden" class="form-control" id="server" name="server" value="localhost" required>
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<div class="col-sm-9">
					        	<input type="hidden" class="form-control" id="username" name="username" value="root" required>
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<div class="col-sm-9">
					        	<input type="hidden" class="form-control" id="password" name="password" value="">
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<div class="col-sm-9">
					        	<input type="hidden" class="form-control" id="dbname" name="dbname" value="ginesbd" required>
					      	</div>
					    </div>		
	<!--captasdasdfsdfsdfsdfschaasdasdasdasdasdasdasdasdasdasdawdeqweqweqweqeqweqwe-->
					    <div class="form-group row">
					      	<label for="sql" class="col-sm-3 col-form-label">Archivo de BD</label>
					      	<div class="col-sm-9">
					        	<input type="file" class="form-control-file" id="sql" name="sql" placeholder="base de datos que deseas restaurar" required>
					      	</div>
					    </div>

							<!--captcha-->
						  <div class="form-group row">
					      	<label for="dbname" class="col-sm-3 col-form-label">Ingrese Captcha</label>
					      	<div class="col-sm-9">
								<input type="text" name="tmptxt" placeholder="Ingresa el Código" required />
					        	<img src="script/captcha.php" width="100" height="30" class="img-polaroid" />
					      	</div>
					    </div>	
						<!-- fin captcha-->
					    <div class="form-group row">
						          <?php
			date_default_timezone_set("Chile/Continental");
          ?>
							<label  class="col-sm-3 col-form-label">Fecha</label>
					      	<div class="col-sm-9">
					        	<input type="text" id="dbname" name="dbname" value="<?php echo date('d/m/Y')?>" required maxlength="10" disabled="disabled">
					      	</div>
					    </div>							
					    <center><button type="submit" class="btn btn-primary" name="restore">Restaurar</button></center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('adminfooter.php') ?>