<?php include('adminheader.php') ?>

        <h1 style="color: #00A2D3; text-transform: uppercase; padding-left:20px;">Modificar Usuario</h1>

        <table cellspacing="0" cellpadding="0"style="width: 500px;" >
        	<?php
				$IDpro=$_REQUEST['IDrequest'];
				include("connection.php");
				$Consulta ="Select * From usuarios where userNumber='$IDpro'";
				$Buscar = $ConexionBD->query($Consulta);
				$Registros = $Buscar->fetch_assoc();

			?>
            <form action="queryuserMOD.php?IDpro2=<?php echo $Registros['userNumber']; ?>" method="post">

			     <tr>
                	<td class="lblproductos">RUT:</td>
                    <td >
                    	<input  type="text" name="txtrut" readonly="readonly" value="<?php echo $Registros['Rut'];?>" />
                    </td>
                </tr>
                <tr>
                	<td class="lblproductos">NOMBRE:</td>
                    <td >
                    	<input  type="text" name="txtnombre"  value="<?php echo $Registros['Nombres'];?>" />
                    </td>
                </tr>
                <tr>
                	<td class="lblproductos">APELLIDO PATERNO:</td>
                    <td >
                    	<input type="text" name="txtappat" class="casillas" required="required"  value="<?php echo $Registros['ApPaterno'];?>"  />
                    </td>
                </tr>
                <tr>
                	<td class="lblproductos">APELLIDO MATERNO:</td>
					<td >
                    	<input type="text" name="txtapmat" class="casillas" required="required"  value="<?php echo $Registros['ApMaterno'];?>"  />
                    </td>
                </tr>
                <tr >
                	<td class="lblproductos">EMAIL:</td>
                    <td>
                    <input  type="text"  name="txtemail" class="casillas"  readonly="readonly" style="height: 20px" value="<?php echo $Registros['Email'];?>" />
                    </td>
                </tr>

                <td colspan="2" class="btnspace">
                	<input type="submit" class="btnmod" name="BtnModificar" value="Guardar" >
                    </td>
                 </tr>

            </form>

        </table>

<?php include('adminfooter.php') ?>
