<?php include('adminheader.php') ?>

<!--         Listado Categorias        -->
<div class="shadow p-3 mb-5 bg-white rounded" style="width:45%;">
<h2 style="color: #00A2D3; padding-left:20px; ">Listado de Categorias


</h2>
<!--         Tabla Listado Categorias        -->
<table cellspacing="0" cellpadding="0" style="width:100%;" class="table table-hover">
 <thead class="thead-dark">
   <tr>
     <th>CODIGO</th>
     <th>NOMBRE</th>
   </tr>
 </thead>
 <?php
   include("connection.php");
   $Consulta = "Select * From categorias";
   $Buscar = $ConexionBD->query($Consulta);
   while ($ListCat = $Buscar->fetch_assoc())
   {
 ?>
 <tbody  id="myTable">
   <tr>
     <td><?php echo $ListCat['categoriaID']; ?></td>
     <td><?php echo $ListCat['categoriaNombre']; ?></td>
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
