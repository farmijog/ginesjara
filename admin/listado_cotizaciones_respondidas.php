<?php include('adminheader.php') ?>
<script src="../js/jspdf.js"></script>
	<script src="../js/pdfFromHTML1.js"></script>

<!--         Listado Cotizaciones        -->

<!--         Listado Cotizaciones Respondidas       -->
   <h2 style="color: #00A2D3; padding-left:20px; ">Cotizaciones Respondidas</h2>
<div class="shadow p-3 mb-5 bg-white rounded" style="width: 90%;">
    <table cellspacing="0" cellpadding="0"  class="table table-hover" >
   <thead class="thead-dark">
     <tr>
       <th>ID</th>
       <th>Nombre Cliente</th>
       <th>Fecha</th>
       <th>Precio Total</th>
       <th>Valor Servicio</th>
       <th>Total Pagar</th>
       <th>DETALLE</th>
     </tr>
   </thead>
   <?php
     include("connection.php");
     $Consulta = "select * from orden, usuarios where estado='0' and orden.userNumber=usuarios.userNumber";
     $Buscar = $ConexionBD->query($Consulta);
	
     while ($ListPro = $Buscar->fetch_assoc())
     {
		 $total = $ListPro['precio_total']+$ListPro['valorservicio'];
   ?>

   <tbody id="myTable">
     <tr>
       <td><?php echo $ListPro['id']; ?></td>
       <td><?php echo $ListPro['Nombres']; ?>&nbsp;<?php echo $ListPro['ApPaterno']; ?>&nbsp;<?php echo $ListPro['ApMaterno']; ?></td>
       <td><?php echo $ListPro['modificada']; ?></td>
       <td>$<?php echo $ListPro['precio_total']; ?></td>
       <td>$<?php echo $ListPro['valorservicio']; ?></td>
       <td><label id="test" name="test"><?php echo $total ?></label></td>
       <td><a href="detalle_cotizacion_respondida.php?IDrequest=<?php echo $ListPro['id']?> " target="_self" style="font-size:25px;" value="Ver Detalle" title="Ver Detalle"><i class="fa fa-file" style="color:#107AE3;"></i></a></td>
     </tr>
   </tbody>
   <?php
			}
			?>
  </table>
  </div>

<div class="col-md-4">
<!--  <button id="GenerarMysql" class="btn btn-default">Generar PDF </button> -->
<input type="submit" onclick="HTMLtoPDF()" class="btn btn-success orderBtn" name="btnresponder" value="Generar PDF" />
<br>
</div>  
  
<!--         HIDDEN       -->

<div id="HTMLtoPDF" >
<img style="display: none" src="../img/HeaderADMIN.png" width="520" height="120"></img>
<table cellspacing="0" cellpadding="0"  class="table table-hover" style="visibility: hidden">
   <thead class="thead-dark">
     <tr>
       <th>ID</th>
       <th>Nombre Cliente</th>
       <th>Fecha</th>
       <th>Precio Total</th>
       <th>Valor Servicio</th>
       <th>Total Pagar</th>
     </tr>
   </thead>
   <?php
     include("connection.php");
     $Consulta = "select * from orden, usuarios where estado='0' and orden.userNumber=usuarios.userNumber";
     $Buscar = $ConexionBD->query($Consulta);

     while ($ListPro = $Buscar->fetch_assoc())
     {
   ?>

   <tbody id="myTable">
     <tr>
       <td><?php echo $ListPro['id']; ?></td>
       <td><?php echo $ListPro['Nombres']; ?>&nbsp;<?php echo $ListPro['ApPaterno']; ?>&nbsp;<?php echo $ListPro['ApMaterno']; ?></td>
       <td><?php echo $ListPro['modificada']; ?></td>
       <td>$<?php echo $ListPro['precio_total']; ?></td>
       <td>$<?php echo $ListPro['valorservicio']; ?></td>
       <td>$<?php echo $ListPro['precio_total']+$ListPro['valorservicio']; ?></td>
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
