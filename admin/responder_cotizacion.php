<?php include('adminheader.php') ?>

<!--         Respuesta Cotizacion        -->

<div class="shadow p-3 mb-5 bg-white rounded" style="width: 75%;">


<!--         Consulta SQL donde se obtienen los datos de la orden por medio de la ID       -->
              <?php
				$IDpro=$_REQUEST['IDrequest'];
				include("connection.php");
				$Consulta ="Select * From orden where id='$IDpro'";
				$Buscar = $ConexionBD->query($Consulta);
				$Registros = $Buscar->fetch_assoc();

			?>
      <h2 style="color: #00A2D3; padding-left:20px;">Detalle Cotizacion #ID&nbsp;<?php echo $Registros['id']; ?></h2>

      <!--         Detalle de los productos de la cotizacion       -->

      <table cellspacing="0" cellpadding="0" style="width:100%;" class="table table-hover">
        <thead class="thead-dark">
       <tr>
         <th>Producto</th>
         <th>Cantidad</label></th>
         <th>Precio</th>
       </tr>
     </thead>
      <!--         Consulta SQL donde se obtienen los datos de los productos de la cotizacion       -->
       <?php
         include("connection.php");

         $Consulta1 = "select * from orden, productos, orden_items where orden.id='$IDpro' and productos.productoCodigo=orden_items.productoCodigo and orden_items.id_orden=orden.id";
         $Buscar1 = $ConexionBD->query($Consulta1);
         while ($custRow1 = $Buscar1->fetch_assoc())
         {
       ?>
       <tbody>


       <tr>
         <td><?php echo $custRow1['productoNombre']; ?></td>
         <td><?php echo $custRow1['cantidad']; ?></td>
         <td>$<?php echo $custRow1['productoPrecio']; ?></td>
       </tr>
     </tbody>

       <?php
          }
       ?>
      </table>

<!--         Formulario de respuesta de la Cotizacion       -->

            <form class="form-group" action="query_cotizacion.php?IDpro2=<?php echo $Registros['id']; ?>" method="post" enctype="multipart/form-data">


<!--         Consulta SQL donde se obtienen los datos del cliente que realizo la cotizacion       -->
      <?php
        include("connection.php");
        $Consulta = "select * from orden, usuarios where id='$IDpro' and orden.userNumber=usuarios.userNumber";
        $Buscar = $ConexionBD->query($Consulta);
        while ($custRow = $Buscar->fetch_assoc())
        {
      ?>

            <!--         Detalle de los datos del cliente que realizo la cotizacion       -->

             <h4 style="color: #00A2D3;  padding-left:20px;">Informacion del Cliente</h4>
               <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">Nombre:</label>
               <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;"><?php echo $custRow['Nombres']; ?></label><br>

                <input type="hidden" name="txtusernum" class="casillas" readonly="readonly"  value="<?php echo $custRow['userNumber']; ?>"/>

               <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">Apellido:</label>
               <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;"><?php echo $custRow['ApPaterno']; ?></label>
                <br>
               <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">Telefono:</label>
               <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;"><?php echo $custRow['Telefono']; ?></label>
                <br>
               <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">Correo:</label>
               <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;"><?php echo $custRow['Email']; ?></label>
                <input type="hidden" name="txtemail" class="casillas" readonly="readonly"  value="<?php echo $custRow['Email']; ?>"/>
          <?php
             }
          ?>
<br><br>
        <!--         Respuesta de la cotizacion      -->
                <h4 style="color: #00A2D3;  padding-left:20px;">Respuesta</h4>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">Estado:</label>
                  <div class="col-sm-10">
                  <select name="select" class="form-control" style="font-family: Noto Sans; font-size: 13px; width:35%;">
                    <option>Validada</option><input type="hidden" name="txtvalidad"  value="0"/>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">Encargado:</label>
        <!--         Consulta para obtener usuario logueado(En este caso es el Admin que reponde la cotizacion)     -->
                  <?php
                  include("connection.php");
                  $Consulta = "Select * from usuarios where Email='$usuario'";
                  $Buscar = $ConexionBD->query($Consulta);
                  while ($listinfo = $Buscar->fetch_assoc()){
                  ?>
                  <div class="col-sm-10">
                    <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;"><?php echo $listinfo['Nombres']; ?></label>
                    <input type="hidden" name="txtnombre" value="<?php echo $listinfo['Nombres']; ?>">

                  </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">Respuesta:</label>
                  <div class="col-sm-10">
                    <textarea name="txtrespuesta" class="form-control" style="font-family: Noto Sans; font-size: 13px; width:50%;" rows="8" cols="80"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">Total:</label>
                  <div class="col-sm-10">
                    <input type="text" name="txtprecio" readonly class="form-control" value="<?php echo $Registros['precio_total'];?>" style="font-family: Noto Sans; width: 25%; font-size: 13px;">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">Valor servicio:</label>
                  <div class="col-sm-10">
                    <input type="text" name="valorservicio" class="form-control" maxlength="6" style="font-family: Noto Sans; width: 25%; font-size: 13px;">
                  </div>
                </div>
                <input type="hidden" name="txtCurrency" class="casillas" size="15" readonly="readonly" value="USD"  />
                <input type="hidden" name="txtcoti" class="casillas" size="15" readonly="readonly" value="Producto"  />
                <?php
                  $IDpro=$_REQUEST['IDrequest'];
                  include("connection.php");
                  $Consulta ="Select * From orden where id='$IDpro'";
                  $Buscar = $ConexionBD->query($Consulta);
                  $Registros = $Buscar->fetch_assoc();
                ?>
                <input type="hidden" name="txtidorden" class="casillas" size="15" readonly="readonly" value="<?php echo $Registros['id']; ?>">
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="btnresponder" value="Responder" style="font-family: Noto Sans; font-size: 13px;" />
                </div>
  </form>
</div>
  <?php include('adminfooter.php') ?>
