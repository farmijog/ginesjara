<?php include('adminheader.php') ?>
<script src="../js/jspdf.js"></script>
	<script src="../js/pdfFromHTML2.js"></script>
<!--         Listado Ventas       -->


  <h2 style="color: #00A2D3; padding-left:20px; ">Ventas Realizadas</h2>
<div class="shadow p-3 mb-5 bg-white rounded" style="width: 75%;">
  <table cellspacing="0" cellpadding="0"  class="table table-hover">
   <thead  class="thead-dark">
     <tr>
       <th>ID</th>
       <th>NOMBRE CLIENTE</th>
       <th>PRECIO TOTAL</th>
       <th>FECHA CREADA</th>
       <th>DETALLE</th>
     </tr>
   </thead>
<!--         Consulta SQL para obtener los datos del usuario con su respectiva orden       -->
   <?php
     include("connection.php");
     //$Consulta = "select * from ordencomprada, usuarios where ordencomprada.userNumber=usuarios.userNumber order by creada DESC";
	 $Consulta = "select * from orden_cmpdir, usuarios where estado='1' and orden_cmpdir.userNumber=usuarios.userNumber";
     $Buscar = $ConexionBD->query($Consulta);
     while ($ListPro = $Buscar->fetch_assoc())
     {
   ?>
   <tbody id="myTable">
     <tr>
       <td><?php echo $ListPro['id']; ?></td>
       <td><?php echo $ListPro['Nombres']; ?>&nbsp;<?php echo $ListPro['ApPaterno']; ?>&nbsp;<?php echo $ListPro['ApMaterno']; ?></td>
       <td>$<?php echo $ListPro['precio_total']; ?></td>
       <td><?php echo $ListPro['creada']; ?></td>
       <td><a href="detalle_venta_realizada.php?IDrequest=<?php echo $ListPro['id']; ?>" target="_self" style="font-size:25px;" value="Ver Detalle" title="Ver Detalle"><i class="fa fa-file" style="color:#107AE3;"></i></a></td>
     </tr>
   </tbody>
   <?php
			}
			?>
  </table>
</div>

<div class="col-md-4">
<input type="submit" onclick="HTMLtoPDF()" class="btn btn-success orderBtn" name="btnresponder" value="Generar PDF" />
<br>
</div>  
  
<!--         HIDDEN       -->
<div id="HTMLtoPDF" >
<img style="display: none" src="../img/HeaderADMIN.png" width="520" height="120"></img>
  <table cellspacing="0" cellpadding="0"  class="table table-hover" style="visibility: hidden">
   <thead  class="thead-dark">
     <tr>
       <th>ID</th>
       <th>Nombre Cliente</th>
       <th>Precio Total</th>
       <th>Fecha Pagada</th>
     </tr>
   </thead>
<!--         Consulta SQL para obtener los datos del usuario con su respectiva orden       -->
   <?php
     include("connection.php");
     //$Consulta = "select * from ordencomprada, usuarios where ordencomprada.userNumber=usuarios.userNumber order by creada DESC";
	 $Consulta = "select * from ordencomprada, usuarios where estado='1' and ordencomprada.userNumber=usuarios.userNumber";
     $Buscar = $ConexionBD->query($Consulta);
     while ($ListPro = $Buscar->fetch_assoc())
     {
   ?>
   <tbody id="myTable">
     <tr>
       <td><?php echo $ListPro['product_id']; ?></td>
       <td><?php echo $ListPro['Nombres']; ?>&nbsp;<?php echo $ListPro['ApPaterno']; ?>&nbsp;<?php echo $ListPro['ApMaterno']; ?></td>
       <td>$<?php echo $ListPro['preciototal']; ?></td>
       <td><?php echo $ListPro['creada']; ?></td>
	   </tr>
   </tbody>
   <?php
			}
			?>
  </table>
<img style="display: none" src="../img/relleno.png" width="580" height="150"></img>
<img style="display: none" src="../img/FooterADMIN.png" width="520" height="185"></img>
</div> 
<!--      Script que permite filtrar      -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<?php include('adminfooter.php') ?>
