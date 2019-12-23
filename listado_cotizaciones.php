<?php include('adminheader.php') ?>

<!--         Listado Cotizaciones        -->


<!--         Listado Cotizaciones Pendientes       -->

  <h2 style="color: #00A2D3; padding-left:20px; ">Cotizaciones Pendientes</h2>
<div class="shadow p-3 mb-5 bg-white rounded" style="width: 75%;">
  <table cellspacing="0" cellpadding="0"  class="table table-hover">
   <thead  class="thead-dark">
     <tr>
       <th>ID</th>
       <th>NOMBRE COTIZADOR</th>
       <th>PRECIO TOTAL</th>
       <th>FECHA CREADA</th>
       <th>RESPONDER</th>
     </tr>
   </thead>
<!--         Consulta SQL para obtener los datos del usuario con su respectiva orden       -->
   <?php
     include("connection.php");
     $Consulta = "select * from orden, usuarios where estado='1' and orden.userNumber=usuarios.userNumber";
     $Buscar = $ConexionBD->query($Consulta);
     while ($ListPro = $Buscar->fetch_assoc())
     {
   ?>
   <tbody>
     <tr>
       <td><?php echo $ListPro['id']; ?></td>
       <td><?php echo $ListPro['Nombres']; ?>&nbsp;<?php echo $ListPro['ApPaterno']; ?>&nbsp;<?php echo $ListPro['ApMaterno']; ?></td>
       <td><?php echo $ListPro['precio_total']; ?></td>
       <td><?php echo $ListPro['creada']; ?></td>
       <td><a href="responder_cotizacion.php?IDrequest=<?php echo $ListPro['id']; ?>" target="_self" value="Responder Cotizacion" title="Responder Cotizacion" style="font-size:25px;"><i class="fa fa-comment"></i></a></td>
     </tr>
   </tbody>
   <?php
			}
			?>
  </table>
</div>

<!--         Listado Cotizaciones Respondidas       -->
   <h2 style="color: #00A2D3; padding-left:20px; ">Cotizaciones Respondidas</h2>
<div class="shadow p-3 mb-5 bg-white rounded" style="width: 75%;">
    <table cellspacing="0" cellpadding="0"  class="table table-hover">
   <thead class="thead-dark">
     <tr>
       <th>ID</th>
       <th>NOMBRE COTIZADOR</th>
       <th>PRECIO TOTAL</th>
       <th>FECHA RESPUESTA</th>
       <!--<th>&nbsp;</th>-->

     </tr>

   </thead>
   <?php
     include("connection.php");
     $Consulta = "select * from orden, usuarios where estado='0' and orden.userNumber=usuarios.userNumber";
     $Buscar = $ConexionBD->query($Consulta);

     while ($ListPro = $Buscar->fetch_assoc())
     {
   ?>
   <tbody>
     <tr>
       <td><?php echo $ListPro['id']; ?></td>
       <td><?php echo $ListPro['Nombres']; ?>&nbsp;<?php echo $ListPro['ApPaterno']; ?>&nbsp;<?php echo $ListPro['ApMaterno']; ?></td>
       <td><?php echo $ListPro['precio_total']; ?></td>
       <td><?php echo $ListPro['creada']; ?></td>
       <!--<td><a href="responderCotizacion.php?IDrequest=<?php echo $ListPro['id']; ?>" id="btnModform" target="_self">Responder</a></td>-->
     </tr>
   </tbody>
   <?php
			}
			?>
  </table>
</div>



<?php include('adminfooter.php') ?>
