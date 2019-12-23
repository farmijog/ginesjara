<?php include('adminheader.php') ?>
<!--         Formulario para Modificar Productos        -->
<h2 style="color: #00A2D3; padding-left:20px;">Modificar Producto</h2>

<!--         Consulta para mostrar datos mediante la request del Codigo        -->
        <?php
        				$IDpro=$_REQUEST['IDrequest'];
        				include("connection.php");
        				$Consulta ="Select * From productos where productoCodigo='$IDpro'";
        				$Buscar = $ConexionBD->query($Consulta);
        				$Registros = $Buscar->fetch_assoc();

        			?>
<!--        Inicio del Formulario        -->
<div class="shadow p-3 mb-5 bg-white rounded"  style="width:70%;">
  <!--        enctype="multipart/form-data" Atributo necesario para cargar "archivos" ej: Imagen        -->
  <form class="form-group" action="query_modificar_producto.php?IDpro2=<?php echo $Registros['productoCodigo']; ?>" method="post"  id="myForm"  enctype="multipart/form-data">
  <div class="row">
  <div class="form-group col-md-5">
    <div class="form-group">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Codigo:</label>
      <input class="form-control" type="text" name="txtcodigo" readonly="readonly" value="<?php echo $Registros['productoCodigo'];?>"  style="font-family: Noto Sans; width:90%; font-size: 13px;">
    </div>
    <div class="form-group">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Nombre:</label>
      <input class="form-control" type="text" name="txtnombre" value="<?php echo $Registros['productoNombre'];?>" style="font-family: Noto Sans;  width:90%; font-size: 13px;" required="required">
    </div>
    <div class="form-group">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Categoria:</label>

        <!--         Select que obtiene las Categorias desde la BD        -->

        <?php
                    include("connection.php");
                    $Consulta =
                    //"Select * from categorias";
                     "Select categoriaID,categoriaNombre From categorias order by categorias.categoriaNombre";
                    $Buscar = $ConexionBD->query($Consulta);
                    $selectbox='<select class="form-control" style="font-family: Noto Sans; width:90%; font-size: 13px;" name=\'cbocategoria\'>';
                    while ($row = $Buscar->fetch_assoc())
                    {
                      $selectbox.="<option value='". $row['categoriaID'] ."'";
					  if($Registros['categoriaID'] == $row['categoriaID']){
					  $selectbox.=" selected='selected'";
					  }
					  $selectbox.='>' . $row['categoriaNombre'] . '</option>';
                    }
                    $selectbox.='</select>';
                    mysqli_free_result($Buscar);
                    echo $selectbox;
         ?>
    </div>
    </div>
    <!--         IMG para mostrar un Preview de la Imagen que se va a subir        -->
    <div class="form-group col-md-5">
      <img class="img-thumbnail img-preview" style="width:225px; height:225px" <?php echo 'src="data:image/jpeg;base64,'.base64_encode( $Registros['productoImagen'] ).'" '; ?>>

    </div>
    </div>



    <div class="form-group">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Descripcion:</label>
      <textarea name="txtdescripcion"  class="form-control" style="font-family: Noto Sans; font-size: 13px; width:75%;" rows="8" cols="60" maxlength="300" value="">
        <?php echo $Registros['productoDescripcion'];?>
      </textarea>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Precio:</label>
      <input class="form-control" type="number" name="txtprecio" value="<?php echo $Registros['productoPrecio'];?>" style="font-family: Noto Sans;width: 80%;font-size: 13px;" required="required">
    </div>
    <div class="form-group col-md-6">
      <label for="" style="font-family: Noto Sans; font-size: 13px;">Imagen:</label>
      <input type="file" class="form-control-file" name="image" id="image" style="font-family: Noto Sans; font-size: 13px;">
      <input type="hidden" id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
      <!-- <input type="hidden" id="img_hidden" name="img_hidden" value="" <?php echo 'src="data:image/jpeg;base64,'.base64_encode( $Registros['productoImagen'] ).'"' ?>> -->
   </div>
    </div>
    <div class="form-group" style="text-align:right;">

      <!--        Boton que acciona el Modal        -->
      <input type="button" name="btn" value="Guardar" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary" style="font-family: Noto Sans; font-size: 13px;"/>
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
                  ¿Esta seguro que desea guardar los cambios?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <a href="#" id="submit" class="btn btn-success success">Aceptar</a>
              </div>
          </div>
      </div>
  </div>



  <script type="text/javascript">
// Script para el Preview de la Imagen

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


   // Script para el Modal de Confirmacion

  $('#submitBtn').click(function() {
       $('#lname').text($('#txtcodigocat').val());
       $('#fname').text($('#txtnombrecat').val());
  });

  $('#submit').click(function(){
      $('#myForm').submit();
  });

  </script>

<?php include('adminfooter.php') ?>
