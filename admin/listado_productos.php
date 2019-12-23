<?php include('adminheader.php') ?>


<!--         Listado Productos        -->
<div class="shadow p-3 mb-5 bg-white rounded" style="width: 85%;">
<h2 style="color: #00A2D3; padding-left:20px; ">Listado de Productos


</h2>
<!--         Tabla Listado Productos        -->
  <table cellspacing="0" cellpadding="0"  class="table table-hover" id="table">
   <thead  class="thead-dark">
     <tr>
       <th>CODIGO</th>
       <th>NOMBRE</th>
       <th>CATEGORIA</th>
       <th>DESCRIPCION</th>
       <th>PRECIO</th>
       <th>IMAGEN</th>
       <th></th>
       <th></th>
     </tr>
   </thead>
<!--         Consulta relacionada para que muestre el Nombre de la categoria en lugar de la ID        -->
   <?php
     include("connection.php");
     $Consulta = "Select productos.*, categorias.categoriaNombre from productos LEFT JOIN categorias ON productos.categoriaID = categorias.categoriaID";
     $Buscar = $ConexionBD->query($Consulta);
     while ($ListPro = $Buscar->fetch_assoc())
     {
   ?>
   <tbody id="myTable">
     <tr>
       <td><?php echo $ListPro['productoCodigo']; ?></td>
       <td><?php echo $ListPro['productoNombre']; ?></td>
       <td><?php echo $ListPro['categoriaNombre']; ?></td>
       <td><?php echo $ListPro['productoDescripcion']; ?></td>
       <td>$<?php echo $ListPro['productoPrecio']; ?></td>

       <?php
       if($ListPro['productoImagen']==""){
     echo"<td><img src ='img/img_no_disponible.png' height='50px' width='50px'/></td>";
    }
    else{
     echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $ListPro['productoImagen'] ).'" height="50px" width="50px"/></td>';
    }
    ?>

 <!--         Botones que permiten Modificar y Eliminar        -->
       <td class="align-middle"><a href="modificar_producto.php?IDrequest=<?php echo $ListPro['productoCodigo']; ?>"target="_self" value="Modificar Producto" title="Modificar Producto" style="font-size:25px;"><i class="fa fa-wrench"></i></a></td>
       <td class="align-middle"><a href="eliminar_producto.php?IDrequest=<?php echo $ListPro['productoCodigo']; ?>"  value="Eliminar Producto" title="Eliminar Producto" style="font-size:25px; color:red;"><i class="fa fa-times-circle"></i></a></td>
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

<?php include('adminfooter.php') ?>
