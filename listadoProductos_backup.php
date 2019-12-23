<?php include('adminheader.php') ?>

<h1 style="color: #00A2D3; text-transform: uppercase; padding-left:20px; ">Listado Historial de Productos</h1>

<table cellspacing="0" cellpadding="0">
 <thead>
   <tr>
     <th>CODIGO</th>
     <th>NOMBRE</th>
     <th>CATEGORIA</th>
     <th>DESCRIPCION</th>
     <th>STOCK</th>
     <th>PRECIO</th>
     <th>IMAGEN</th>

     <th></th>

   </tr>

 </thead>
 <?php
   include("connection.php");
   $Consulta = "Select * From productos_backup";
   $Buscar = $ConexionBD->query($Consulta);

   while ($ListPro = $Buscar->fetch_assoc())
   {
 ?>
 <tbody>
   <tr>
     <td><?php echo $ListPro['productoCodigo_backup']; ?></td>
     <td><?php echo $ListPro['productoNombre_backup']; ?></td>
     <td><?php echo $ListPro['categoriaID']; ?></td>
     <td><?php echo $ListPro['productoDescripcion_backup']; ?></td>
     <td><?php echo $ListPro['productoStock_backup']; ?></td>
     <td><?php echo $ListPro['productoPrecio_backup']; ?></td>
     <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ListPro['productoImagen_backup'] ).'" height="50px" width="50px"/>'; ?></td>

     <td><a href="recuperarProducto.php?IDrequest=<?php echo $ListPro['productoCodigo_backup']; ?>" id="btnEli" >Recuperar</a></td>

   </tr>


 </tbody>
 <?php
    }
    ?>
</table>
<br>






<?php include('adminfooter.php') ?>
