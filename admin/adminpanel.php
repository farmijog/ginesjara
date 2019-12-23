
<?php include('adminheader.php') ?>


<div class="heading">
   <h1 style="color: #00A2D3; text-transform: uppercase; padding-left:20px; " ><b>Panel de Administrador TGJ</b></h1>

 </div>

 <div class="cards">
   <div class="col-md-4">

<?php
include("connection.php");
$Consulta = "Select * from usuarios where Email='$usuario'";
$Buscar = $ConexionBD->query($Consulta);

while ($listinfo = $Buscar->fetch_assoc()){
?>

    <div class="card">
      <center><img src="img/user_img.png" height="100px" alt="Responsive image" ></center><br>
        <span class="usuarioname"><?php echo $listinfo['Nombres']; ?></span>
        <span class="usuariotitulo"><b>Administrador</b></span>
        <hr>
        <center><span style="font-size: 14px"><?php echo $listinfo['Email']; ?></span></center>
      </div>
      <?php
      }
      ?>
</div>

<div class="col-md-4">
      <div class="card">
        <h6>Especificaciones</h6>
        <span class="date" >
          <?php
			date_default_timezone_set("Chile/Continental");
            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

            echo $dias[date('w')]." ".date('d').", ".$meses[date('n')-1]. " ".date('Y
			<br>') ;
			echo date("H:i");
          ?>
        </span>

        <div class="col-md-2">

        </div>
        <div class="col-md-10">
          <span class="location">Estado actual:</span>
          <span class="position"><label class="trabajo"></label>&nbsp; Online</span>
          <span class="time"  id="ct"></span>

        </div>

      </div>
  </div>

<!--         "conteiner" donde se muestra informacion adicional(usuarios, ventas, cotizaciones, etc.)       -->
<div class="container">
<div class="card">


  <!--         consulta para obtener la cantidad de usuarios registrados        -->
  <?php
  include("connection.php");
  $sql1 = "SELECT * FROM usuarios";
  $result = mysqli_query($ConexionBD, $sql1);

  if ($result)
   {
    }
     else
   {
     echo "Error: "  . $sql . "<br>" . mysqli_error($conn);
   }

    $count=0;
    if (mysqli_num_rows($result) > 0)
   {
  // output data of each row
    while($row = mysqli_fetch_assoc($result))
  {
    $count++;
   }
  ?>

  <!--         "card" donde se muestra la cantidad de usuarios registrados        -->


  <div class="card card-body tx-white bg-info bd-0" >
      <div class="card-block text-white">
        <div class="row">
        <div class="col-md-8">
          <h4 class="card-title font-weight-normal"><?php echo $count; ?></h4>
          <p class="card-text"><a href="listado_usuarios.php" style="text-decoration:none; color:white;font-size:12px">Usuarios Registrados</a></p>
        </div>
        <div class="col-md-4">
          <h1><i class="fa fa-users"></i></h1>
        </div>
      </div>
      </div>
    </div>
    <br>


   <?php
  }
    else
   {
    echo "";
   }
  ?>




  <!--         consulta para obtener la cantidad de ventas realizadas        -->
  <?php
  include("connection.php");
  $sql2 = "SELECT * FROM ordencomprada where estado='1'";
  $result = mysqli_query($ConexionBD, $sql2);

  if ($result)
   {
    }
     else
   {
     echo "Error: "  . $sql . "<br>" . mysqli_error($conn);
   }

    $count1=0;
    if (mysqli_num_rows($result) > 0)
   {
  // output data of each row
    while($row = mysqli_fetch_assoc($result))
  {
    $count1++;
   }
  ?>

  <!--         "card" donde se muestra la cantidad de ventas realizadas        -->


  <div class="card card-body tx-white bg-success bd-0" >
      <div class="card-block text-white">
        <div class="row">
        <div class="col-md-8">
          <h4 class="card-title font-weight-normal"><?php echo $count1; ?></h4>
          <p class="card-text"><a href="listado_ventas.php" style="text-decoration:none; color:white;font-size:12px">Ventas Realizadas</a></p>
        </div>
        <div class="col-md-4">
          <h1><i class="fa fa-dollar" aria-hidden="true"></i></h1>
        </div>
      </div>
      </div>
  </div>
  <br>


   <?php
  }
    else
   {
    echo "";
   }
  ?>




  <!--         consulta para obtener la cantidad de cotizaciones realizadas        -->
  <?php
  include("connection.php");
  $sql3 = "SELECT * FROM orden where estado='0'";
  $result = mysqli_query($ConexionBD, $sql3);

  if ($result)
   {
    }
     else
   {
     echo "Error: "  . $sql . "<br>" . mysqli_error($conn);
   }

    $count2=0;
    if (mysqli_num_rows($result) > 0)
   {
  // output data of each row
    while($row = mysqli_fetch_assoc($result))
  {
    $count2++;
   }
  ?>

  <!--         "card" donde se muestra la cantidad de cotizaciones realizadas        -->


  <div class="card card-body tx-white bg-danger bd-0" >
      <div class="card-block text-white">
        <div class="row">
        <div class="col-md-8">
          <h4 class="card-title font-weight-normal"><?php echo $count2; ?></h4>
          <p class="card-text"><a href="listado_cotizaciones_respondidas.php" style="text-decoration:none; color:white;font-size:12px">Cotizaciones Respondidas</a></p>
        </div>

        <div class="col-md-4">
          <h1><i class="fa fa-calendar-check-o" aria-hidden="true"></i></h1>
        </div>
      </div>
      </div>
  </div>


   <?php
  }
    else
   {
    echo "";
   }
  ?>

  <br>
  <!--         consulta para obtener la cantidad de cotizaciones pendientes        -->
  <?php
  include("connection.php");
  $sql4 = "SELECT * FROM orden where estado='1'";
  $result = mysqli_query($ConexionBD, $sql4);

  if ($result)
   {
    }
     else
   {
     echo "Error: "  . $sql . "<br>" . mysqli_error($conn);
   }

    $count3=0;
    if (mysqli_num_rows($result) > 0)
   {
  // output data of each row
    while($row = mysqli_fetch_assoc($result))
  {
    $count3++;
   }
  ?>

  <!--         "card" donde se muestra la cantidad de cotizaciones pendientes        -->


  <div class="card card-body tx-white bg-secondary bd-0" >
      <div class="card-block text-white">
        <div class="row">
        <div class="col-md-8">
          <h4 class="card-title font-weight-normal"><?php echo $count3; ?></h4>
          <p class="card-text"><a href="listado_cotizaciones.php" style="text-decoration:none; color:white;font-size:12px">Cotizaciones Pendientes</a></p>
        </div>

        <div class="col-md-4">
          <h1><i class="fa fa-calendar-check-o" aria-hidden="true"></i></h1>
        </div>
      </div>
      </div>
  </div>


   <?php
  }
    else
   {
    echo "";
   }
  ?>  



</div><!--      div donde termina el card    -->
</div><!--      div donde termina el container     -->
</div><!--      div donde termina la seccion de card superior    -->

<hr>
<div class="cards">
  

</div>



<?php include('adminfooter.php') ?>
