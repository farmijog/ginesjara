<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache"><head>
   <?php include('./inc/header.php'); ?>
<body>

 <script src="js/push.min.js"></script>

<noscript>
    &amp;lt;div id="msg-noscript"&amp;gt;
    �Su navegador no soporta Javascript!.. Active el uso de Javascript en su navegador para visualizar el sitio web.
    &amp;lt;/div&amp;gt;
</noscript>

<script>

Push.create("Desea realizar una cotización? o consulta",{
  body : "Si desea realizar algo, presione sobre esta notificacion",
  icon : "img/producto.png",
  onClick : function() {
    window.location = "http://127.0.0.1/PROYECTO/Productos.php";
    this.close();
  }
} );

</script>

<div id="Main">
<div id="WebPage">

	<div class="align">


			<input name="accion" id="accion" type="hidden" value="ADD">
			<input name="cliente_codigo" id="cliente_codigo" type="hidden" value="">
			<input name="cliente_validado" id="cliente_validado" type="hidden" value="">
			<input name="cliente_archivo1" id="cliente_archivo1" type="hidden" value="">
			<input name="cliente_archivo2" id="cliente_archivo2" type="hidden" value="">

			<div class="ContenidoTable">
				<div style="background: #dddddd; border-top-left-radius: 4px; border-top-right-radius:4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;" class="table-bordered">
					<h4 class="tabletitle"><span class="nombreTabla">PANEL DE USUARIO</span></h4>

						<div class="IntTable">
              <form action="informacioncliente.php" method="post">
				            <div class="control-group">
                      <input type="submit" name="btn" id="btn" style="width:100%;" value="Información del Cliente" class="btn btn-success">

				            </div></form>

							<form action="modificarclave.php" method="post">
                       <div class="control-group">
                     <input type="submit" name="btn" id="btn" style="width:100%;" value="Cambiar Contraseña" class="btn btn-success">
                      </div></form>

                   <!--<div class="control-group"
                    <input type="submit" name="btn"  id="btn" style="width:100%;" value="Cambiar Tipo Cuenta" class="btn btn-success">

                  </div>>-->
                  <form action="compraspagadas.php" method="post">
                  <div class="control-group">
                   <input type="submit" name="btn" id="btn" style="width:100%;" value="Compras pagadas" class="btn btn-success">

                 </div></form>
                 <form action="pedidospagados.php" method="post">
                 <div class="control-group">
                   <input type="submit" name="btn" id="btn" style="width:100%;" value="Pedidos pagados" class="btn btn-success">

                 </div></form>
<br>
<br>
<br>
<br>
<br>							<form action="cerrarsesion.php" method="post">
                    <div class="control-group">
                      <form action="cerrarsesion.php" method="post">
				             <input type="submit" name="btn" id="btn" style="width:50%; margin-left:150px;" value="Cerrar Sesión" class="btn btn-success">
                      </form></div></form>
				            </div>
						</div>
				</div>
			</div>

		</div>
	</div>
</div>
   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>
