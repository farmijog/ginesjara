<?php include('adminheader.php') ?>

<!--         Listado Usuarios        -->

<!--         Listado Usuarios Admin        -->

<div class="shadow p-3 mb-5 bg-white rounded" style="width: 100%;">
  <h2 style="color: #00A2D3; padding-left:20px; ">Lista de Usuarios Admin</h2>
  <table cellspacing="0" cellpadding="0" class="table table-hover">
   <thead  class="thead-dark">
     <tr>
	   <th>RUT</th>
       <th>NOMBRE</th>
       <th>APELLIDO PATERNO</th>
       <th>APELLIDO MATERNO</th>
       <th>EMAIL</th>
       <th>TELEFONO</th>
       <th>SEXO</th>
       <th>VERIFICADO</th>
       <th></th>

     </tr>
   </thead>
<!--         Consulta para obtener los datos del Usuario tipo Admin        -->
   <?php
     include("connection.php");
     $Consulta = "Select * From usuarios where usertipo='Admin'";
     $Buscar = $ConexionBD->query($Consulta);
     while ($ListPro = $Buscar->fetch_assoc())
     {
   ?>
   <tbody>
     <tr>
	   <td><?php echo $ListPro['Rut']; ?></td>
       <td><?php echo $ListPro['Nombres']; ?></td>
       <td><?php echo $ListPro['ApPaterno']; ?></td>
       <td><?php echo $ListPro['ApMaterno']; ?></td>
       <td><?php echo $ListPro['Email']; ?></td>
       <td><?php echo $ListPro['Telefono']; ?></td>
       <td><?php echo $ListPro['Sexo']; ?></td>
       <td><?php echo $ListPro['Verificado']; ?></td>
       <td><a href="modusuario.php?IDrequest=<?php echo $ListPro['userNumber']; ?>" target="_self"  value="Modificar Usuario" title="Modificar Usuario" style="font-size:25px;"><i class="fa fa-wrench"></i></a></td>
     </tr>
   </tbody>
   <?php
			}
			?>
  </table>
</div>


<!---<div style="text-align: right; padding-right: 25%;"><a href="agregarProducto.php" class="btnmod"  target="_self" >Agregar</a></div>--->

<!--         Listado Usuario Normal       -->

<div class="shadow p-3 mb-5 bg-white rounded" style="width: 100%;">
  <h2 style="color: #00A2D3; padding-left:20px; ">Lista de Usuarios</h2>
  <table cellspacing="0" cellpadding="0"  class="table table-hover" >
   <thead class="thead-dark">
     <tr>
	   <th>RUT</th>
       <th>NOMBRE</th>
       <th>APELLIDO PATERNO</th>
       <th>APELLIDO MATERNO</th>
       <th>EMAIL</th>
       <th>TELEFONO</th>
       <th>SEXO</th>
       <th>VERIFICADO</th>
       <th></th>
       <th></th>
     </tr>
   </thead>
<!--         Consulta para obtener los datos del Usuario tipo Normal        -->
   <?php
     include("connection.php");
     $Consulta = "Select * From usuarios where usertipo='Normal'";
     $Buscar = $ConexionBD->query($Consulta);
     while ($ListPro = $Buscar->fetch_assoc())
     {
   ?>
   <tbody>
     <tr>
	   <td><?php echo $ListPro['Rut']; ?></td>
       <td><?php echo $ListPro['Nombres']; ?></td>
       <td><?php echo $ListPro['ApPaterno']; ?></td>
       <td><?php echo $ListPro['ApMaterno']; ?></td>
       <td><?php echo $ListPro['Email']; ?></td>
       <td><?php echo $ListPro['Telefono']; ?></td>
       <td><?php echo $ListPro['Sexo']; ?></td>
       <td><?php echo $ListPro['Verificado']; ?></td>
       <td><a href="modusuario.php?IDrequest=<?php echo $ListPro['userNumber']; ?>" target="_self"  value="Modificar Usuario" title="Modificar Usuario" style="font-size:25px;"><i class="fa fa-wrench"></i></a></td>
       <td><a href="eliminarusuario.php?IDrequest=<?php echo $ListPro['userNumber']; ?>"  value="Eliminar Producto" title="Eliminar Producto" style="font-size:25px; color:red;" ><i class="fa fa-times-circle"></i></a></td>
     </tr>
   </tbody>
   <?php
			}
			?>
  </table>
</div>
  <br>

<!---<div style="text-align: right; padding-right: 25%;"><a href="agregarProducto.php" class="btnmod"  target="_self" >Agregar</a></div>--->

<?php include('adminfooter.php') ?>
