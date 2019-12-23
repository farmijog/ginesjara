<?php include('adminheader.php') ?>



<h1 style="color: #00A2D3; text-transform: uppercase; padding-left:20px; ">RESULTADO BUSQUEDA</h1>


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
     <th></th>

   </tr>

 </thead>
 <?php

   while ($ListPro = $Buscar->fetch_assoc())
   {
 ?>
 <tbody>
   <tr>
     <td><?php echo $ListPro['productoCodigo']; ?></td>
     <td><?php echo $ListPro['productoNombre']; ?></td>
     <td><?php echo $ListPro['categoriaID']; ?></td>
     <td><?php echo $ListPro['productoDescripcion']; ?></td>
     <td><?php echo $ListPro['productoStock']; ?></td>
     <td><?php echo $ListPro['productoPrecio']; ?></td>
     <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ListPro['productoImagen'] ).'" height="50px" width="50px"/>'; ?></td>
     <td><a href="modificarProducto.php?IDrequest=<?php echo $ListPro['productoCodigo']; ?>" id="btnModform" target="_self" >Modificar</a></td>
     <td><a href="eliminarProducto.php?IDrequest=<?php echo $ListPro['productoCodigo']; ?>" id="btnEli" >Eliminar</a></td>

   </tr>


 </tbody>
 <?php
    }
    ?>
</table>






<?php include('adminfooter.php') ?>
