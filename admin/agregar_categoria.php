<?php include('adminheader.php') ?>

<!--         Formulario para Agregar Categorias        -->
<h2 style="color: #00A2D3;  padding-left:20px;">Agregar Categoria</h2>

<!-- Alerta de datos guardados -->
<?php
if (isset($_GET['success']) && $_GET['success'] == 'true') {
?>
<div class="alert alert-success" role="alert"style="width:35%;">
  Categoria agregada satisfactoriamente.
</div>
<?php
}
 ?>
<div class="shadow p-3 mb-5 bg-white rounded"  style="width:40%;">
<form class="form-group" action="query_agregar_categoria.php" method="post" id="myForm">
  <div class="form-group">
    <label for="" style="font-family: Noto Sans; font-size: 13px;">Codigo:</label>
    <input class="form-control" type="text" name="txtcodigocat" value="" style="font-family: Noto Sans; width: 50%; font-size: 13px;" required="required"  >
  </div>
  <div class="form-group">
    <label for="" style="font-family: Noto Sans; font-size: 13px;">Nombre:</label>
    <input class="form-control" type="text" name="txtnombrecat" value="" style="font-family: Noto Sans; width: 65%; font-size: 13px;" required="required" >
  </div><br>
<!--        Boton que acciona el Modal        -->
  <input type="button" name="btn" value="Agregar" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary" style="font-family: Noto Sans; font-size: 13px;"/>
</form>
</div>

<!--        Modal de Confirmacion        -->
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirmacion
            </div>
            <div class="modal-body">
                ¿Esta seguro que desea agregar esta categoria?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="#" id="submit" class="btn btn-success success">Aceptar</a>
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
