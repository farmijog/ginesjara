<?php include('adminheader.php') ?>

<!--         Formulario para Agregar Categorias        -->
<h2 style="color: #00A2D3;  padding-left:20px;">Restaurar Base de datos.</h2>

<div class="container">
  <h2></h2>
  <!-- Button to Open the Modal --><br><br>
    <img src="img/config.png" class="mx-auto d-block" style="width:30%"><br><br>
  <center>
<script type='text/javascript'>document.write(unescape('%20%20%20%20%20%20%20%20%20%20%3C%73%63%72%69%70%74%20%74%79%70%65%3D%22%74%65%78%74%2F%6A%61%76%61%73%63%72%69%70%74%22%3E%0A%66%75%6E%63%74%69%6F%6E%20%65%6E%76%69%61%72%54%72%61%6D%69%74%65%31%28%65%76%74%29%20%7B%0A%20%20%20%20%76%61%6C%6F%72%20%3D%20%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%22%63%6C%61%76%65%22%29%2E%76%61%6C%75%65%3B%0A%20%20%20%20%69%66%20%28%76%61%6C%6F%72%20%3D%3D%3D%20%22%31%32%33%34%35%36%37%38%39%22%29%20%7B%0A%20%20%20%20%20%20%20%20%6C%6F%63%61%74%69%6F%6E%2E%68%72%65%66%20%3D%20%22%72%65%73%74%61%75%2E%70%68%70%22%3B%0A%20%20%20%20%20%20%20%20%65%76%74%2E%70%72%65%76%65%6E%74%44%65%66%61%75%6C%74%28%29%3B%0A%20%20%20%20%20%20%20%20%72%65%74%75%72%6E%20%66%61%6C%73%65%3B%0A%20%20%20%20%7D%20%65%6C%73%65%20%7B%0A%20%20%20%20%20%20%20%20%72%65%74%75%72%6E%20%74%72%75%65%3B%0A%20%20%20%20%7D%0A%7D%0A%20%20%20%20%20%20%20%20%3C%2F%73%63%72%69%70%74%3E%0A'))</script>
  
  <form class="form-group"  onsubmit="enviarTramite1(event);"  action="" method="post" id="myForm">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> 
    Restaurar
  </button>
  </center>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Alerta</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
	<div class="modal-body">
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" placeholder="Contraseña" size="3" id="clave" name="clave" ><br>
	Por seguirdad se solicita que ingrese su contraseña.
     </div>   
        <!-- Modal footer -->
<div class="modal fade" id="confirm-submit" >

</div>
            <div class="modal-footer">
				<input id="boton" class="btn btn-success" name="enviar" type="submit" value="Aceptar"> 
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
 </form>   
      </div>
    </div>
  </div>
  
</div>
			

<!--        Script para el Modal de Confirmacion        -->

<script type="text/javascript">


$('#submitBtn').click(function() {
     $('#lname').text($('#txtcodigocat').val());
     $('#fname').text($('#txtnombrecat').val());
});

$('#submit').click(function(){
    $('#myForm').submit();
});

</script>

<?php include('adminfooter.php') ?>
