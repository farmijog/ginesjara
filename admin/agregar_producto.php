<?php include('adminheader.php') ?>

<!--         Formulario para Agregar Productos        -->

<h2 style="color: #00A2D3;  padding-left:20px;">Agregar Producto</h2>

<div class="shadow p-3 mb-5 bg-white rounded"  style="width:70%;">
  <form class="form-group" action="query_agregar_producto.php" method="post"  id="myForm"  enctype="multipart/form-data">
    <div class="row">
      <div class="form-group col-md-5">



    <div class="form-group">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Codigo:</label>
      <input class="form-control" type="text" name="txtcodigo" value="" style="font-family: Noto Sans; width: 90%; font-size: 13px;" required="required"  >
    </div>
    <div class="form-group">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Nombre:</label>
      <input class="form-control" type="text" name="txtnombre" value="" style="font-family: Noto Sans; width: 90%; font-size: 13px;" required="required"  >
    </div>
    <div class="form-group">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Categoria:</label>

<!--         Select que obtiene las Categorias desde la BD        -->
      <?php
                  include("connection.php");
                  $Consulta = "Select * From categorias order by categoriaNombre";
                  $Buscar = $ConexionBD->query($Consulta);
                  $selectbox='<select class="form-control" style="font-family: Noto Sans; font-size: 13px; width:90%;" name=\'cbocategoria\'>';
                  while ($row = $Buscar->fetch_assoc())
                  {
                    $selectbox.='<option value=' . $row['categoriaID'] . '>' . $row['categoriaNombre'] . '</option>';
                  }
                  $selectbox.='</select>';
                  mysqli_free_result($Buscar);
                  echo $selectbox;
       ?>
    </div>
    </div>
    <!--         IMG para mostrar un Preview de la Imagen que se va a subir        -->
    <div class="form-group col-md-5">
      <img src="img/img_no_disponible.png" style="width:225px; height:225px" alt="..." title="Preview" class="img-thumbnail img-preview">
    </div>
    </div>

    <div class="form-group">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Descripcion:</label>
      <textarea name="txtdescripcion"  class="form-control" style="font-family: Noto Sans; font-size: 13px; width:75%;" rows="8" cols="60" maxlength="300"></textarea>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Precio:</label>
      <input class="form-control" type="number" name="txtprecio" value="" style="font-family: Noto Sans;width: 80%;font-size: 13px;" required="required"  >
    </div>





    <div class="form-group col-md-6">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Imagen:</label>

      <input type="file" class="form-control-file" name="image" id="image" style="font-family: Noto Sans; font-size: 13px;" >


    </div>
    
   </div>
    <div class="form-group" style="text-align:right;">
      <!--        Boton que acciona el Modal        -->
      <input type="button" name="btn" value="Guardar" id="submitBtn" data-toggle="modal" data-target="#confirm-submit"
       class="btn btn-primary" style="font-family: Noto Sans; font-size: 13px;"/>
    </div>

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
                ¿Esta seguro que desea guardar este producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="#" id="submit" class="btn btn-success success">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<!--        Script para el Preview de la Imagen        -->

<script type="text/javascript">

$(document).ready(function() {
    var brand = document.getElementById('image');
    brand.className = 'form-control-file';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function() {
        readURL(this);
    });
});

<!--        Script para el Modal de Confirmacion        -->

$('#submitBtn').click(function() {
     $('#lname').text($('#txtcodigocat').val());
     $('#fname').text($('#txtnombrecat').val());
});

$('#submit').click(function(){
    $('#myForm').submit();
});

</script>


      <?php include('adminfooter.php') ?>
