<?php include('adminheader.php') ?>

<!--         Detalle Venta realizada       -->

<div class="shadow p-3 mb-5 bg-white rounded" style="width: 75%;">

<!--         Consulta SQL donde se obtienen los datos de la orden por medio de la ID       -->

<?php
  $IDpro=$_REQUEST['IDrequest'];
  include("connection.php");
  $Consulta ="Select * From orden_cmpdir where id='$IDpro'";
  $Buscar = $ConexionBD->query($Consulta);
  $Registros = $Buscar->fetch_assoc();
?>
<h2 style="color: #00A2D3; padding-left:20px;">Detalle Venta #ID&nbsp;<?php echo $Registros['id']; ?></h2>

<!--         Detalle de los productos de la Venta      -->

<table cellspacing="0" cellpadding="0" style="width:100%;" class="table table-hover">
  <thead class="thead-dark">
 <tr>
   <th>Producto</th>
   <th>Cantidad</label></th>
   <th>Precio Unitario</th>
   <th>Precio Total</th>
 </tr>
</thead>
<!--         Consulta SQL donde se obtienen los datos de los productos de la cotizacion       -->
 <?php
   include("connection.php");

   $Consulta1 = "select * from orden_cmpdir, productos, orden_itemscmpdir where orden_cmpdir.id='$IDpro' and productos.productoCodigo=orden_itemscmpdir.productoCodigo and orden_itemscmpdir.id_orden=orden_cmpdir.id";
   $Buscar1 = $ConexionBD->query($Consulta1);
   while ($custRow1 = $Buscar1->fetch_assoc())
   {
 ?>
 <tbody>
 <tr>
   <td><?php echo $custRow1['productoNombre']; ?></td>
   <td><?php echo $custRow1['cantidad']; ?></td>
   <td>$<?php echo $custRow1['productoPrecio']; ?></td>
   <td>$<?php echo $custRow1['productoPrecio']*$custRow1['cantidad']; ?></td>
 </tr>
</tbody>
 <?php
    }
 ?>
</table>
<!--         Inicio Formulario de venta (aqui solo se muestra la informacion, no accionará ningun mantenedor)      -->

<form class="form-group" action="" method="post" enctype="multipart/form-data">


<!--         Consulta SQL donde se obtienen los datos del cliente que realizo la venta      -->
<?php
include("connection.php");
$Consulta = "select * from orden_cmpdir, usuarios where id='$IDpro' and orden_cmpdir.userNumber=usuarios.userNumber";
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
<br>
   <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">Total:</label>
   <label for="" class="col-sm-2 col-form-label" style="font-family: Noto Sans; font-size: 13px;">$<?php echo $custRow['precio_total']; ?></label>
   <?php
 }
?>
<br><br>

    <div class="form-group">
      <a href="listado_ventas.php"><input type="button" class="btn btn-primary" name="btnresponder" value="Volver" style="font-family: Noto Sans; font-size: 13px;" /></a>
    </div>
</form>



</div>

<?php include('adminfooter.php') ?>
