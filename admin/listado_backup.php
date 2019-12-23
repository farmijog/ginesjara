<?php include('adminheader.php') ?>
<!--         Listado Backup       -->
<h2 style="color: #00A2D3; padding-left:20px; ">Lista Historial de Productos</h2>
<div class="shadow p-3 mb-5 bg-white rounded" style="width: 85%;">
<table cellspacing="0" cellpadding="0"  class="table table-hover" id="table">
 <thead class="thead-dark">
   <tr>
     <th>CODIGO</th>
     <th>NOMBRE</th>
     <th>CATEGORIA</th>
     <th>DESCRIPCION</th>
     <th>PRECIO</th>
     <th>IMAGEN</th>
     <th>RESTAURAR</th>
   </tr>

 </thead>
 <!--         Consulta SQL para buscar los datos de la tabla backup       -->
 <?php
   include("connection.php");
   $Consulta = "Select * From productos_backup";
   $Buscar = $ConexionBD->query($Consulta);

   while ($ListPro = $Buscar->fetch_assoc())
   {
 ?>
 <tbody  id="myTable">
   <tr>
     <td><?php echo $ListPro['productoCodigo_backup']; ?></td>
     <td><?php echo $ListPro['productoNombre_backup']; ?></td>
     <td><?php echo $ListPro['categoriaID']; ?></td>
     <td><?php echo $ListPro['productoDescripcion_backup']; ?></td>
     <td>$<?php echo $ListPro['productoPrecio_backup']; ?></td>
     <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ListPro['productoImagen_backup'] ).'" height="50px" width="50px"/>'; ?></td>
     <td class="align-middle" style="text-align:center;"><a href="recuperar_producto.php?IDrequest=<?php echo $ListPro['productoCodigo_backup']; ?>" value="Restaurar Producto" title="Restaurar Producto" style="font-size:25px;" ><i class="fa fa-arrow-circle-up"></i></a></td>
   </tr>
 </tbody>
 <?php
    }
    ?>
</table>
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
<br>


<?php include('adminfooter.php') ?>
