<?php
ob_start();
?>
<?php
  include("connection.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--         CSS Iconos          -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!--         CSS Admin           -->
<link rel="stylesheet" href="css/adminstyle.css">
<!--         CSS Bootstrap       -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--         JS Bootstrap        -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--         JS Ajax       -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<!--         JQuery DataTables      -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
<!--         JQuery PDF      -->
<script src="jspdf/dist/jspdf.min.js"></script>
<script src="js/jspdf.plugin.autotable.min.js"></script>

<title>Admin Panel</title>

</head>
<body>
<!--         SideBar       -->
<div class="sidebar">
  <section id="sideMenu">
    <center><h2 style="color:white; padding: 15px;">ADMIN PANEL</h2></center>
    <nav>
      <a href="adminpanel.php" id="idhome"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
      <a class="dropdown-btn"><i class="fa fa-clone" aria-hidden="true"></i>Categorias<i class="fa fa-caret-down"></i></a>
      <div class="dropdown-container">
        <a href="agregar_categoria.php" style="background-color:#2D466C; padding-left:20%;" >Agregar Categoria</a>
        <a href="listado_categorias.php" style="background-color:#2D466C; padding-left:20%;" >Lista de Categorias</a>
      </div>
      <a class="dropdown-btn"><i class="fa fa-product-hunt" aria-hidden="true"></i>Productos<i class="fa fa-caret-down"></i></a>
      <div class="dropdown-container">
        <a href="agregar_producto.php" style="background-color:#2D466C; padding-left:20%;" >Agregar Producto</a>
        <a href="listado_productos.php" style="background-color:#2D466C; padding-left:20%;" >Lista de Productos</a>
      </div>
      <a class="dropdown-btn"><i class="fa fa-history" aria-hidden="true"></i>Historial<i class="fa fa-caret-down"></i></a>
      <div class="dropdown-container">
        <a href="listado_backup.php" style="background-color:#2D466C; padding-left:20%;">Productos</a>
      </div>
      <a class="dropdown-btn"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Cotizaciones<i class="fa fa-caret-down"></i></a>
      <div class="dropdown-container">
        <a href="listado_cotizaciones.php" style="background-color: #2D466C; padding-left:20%;">Cotizaciones Pendientes</a>
        <a href="listado_cotizaciones_respondidas.php" style="background-color:#2D466C; padding-left:20%;">Cotizaciones Respondidas</a>
      </div>
      <a class="dropdown-btn"><i class="fa fa-dollar" aria-hidden="true"></i>Ventas<i class="fa fa-caret-down"></i></a>
      <div class="dropdown-container">
        <a href="listado_ventas.php" style="background-color:#2D466C; padding-left:20%;">Ventas Realizadas</a>
      </div>
      <a href="listado_usuarios.php" target="_self"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Usuarios</a>
      <a class="dropdown-btn"><i class="fa fa-cogs"></i>Configuración<i class="fa fa-caret-down"></i></a>
      <div class="dropdown-container">
        <a href="crearespaldo.php" style="background-color:#2D466C; padding-left:20%;">Respaldar BD</a>
		<!-- <a href="restauracion.php" style="background-color:#2D466C; padding-left:20%;">Restaurar BD</a>-->
      </div>
    </nav>
  </section>
</div>

  <!--         script para accionar el dropdown        -->
<script>
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
</script>

  <!--         NavBar        -->
<div class="shadow-sm p-2 mb-1 bg-white rounded">
  <nav class="navbar navbar-light bg-light" style="margin-left:280px; margin-top: 1px;">
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="text" id="myInput" placeholder="Buscar..." style="width: 300px;">
      <button style="background-color:transparent; border:0;height:40px; width:40px;"  type="submit" disabled="disabled"><i class="fa fa-search"  style="color:#00A2D3;"></i></button>
    </form>
    <!--         Usuario logueado, Notificacion y Cerrar sesion        -->
<?php
      require_once("sesion.class.php");
    	@$sesion = new sesion();
    	@$usuario = $sesion->get("email");
    	if( $usuario == true ){
    	 include("connection.php");
       $Consulta = "Select * from usuarios where Email='$usuario'";
       $Buscar = $ConexionBD->query($Consulta);
    	while ($listinfo = $Buscar->fetch_assoc()){
?>
    <div class="d-flex justify-content-end">
    <a class="nav-link" style="font-family: Noto Sans; font-size:14px;" ><?php echo $listinfo['Nombres']; ?></a>

   <?php
     include("connection.php");
     $Consulta = "SELECT count(estado) FROM orden WHERE estado='1'";
     $Buscar = $ConexionBD->query($Consulta);

     while ($Buscaaa = $Buscar->fetch_assoc())
     {
   ?>
    <a href="listado_cotizaciones.php" class="nav-link">
      <i class="fa fa-bell" style="color:#025FBC;" title="Cotizaciones"></i>
      <span class="circulo"><?php echo $Buscaaa['count(estado)']; ?></span>
     </a>
<?php
}
?>
    <a href="cerrarsesion.php" class="nav-link" style="font-family: Noto Sans; font-size:14px; color:black;" >Cerrar sesion &nbsp;<i class="fa fa-sign-out" style="font-size:20px"></i></a>
    </div>
  </nav>
</div>

<?php
}}
else{
header("Location:index.php");
?>
<?php
}
?>

<!--         Contenido Admin (Mantenedores, Tablas, etc.)       -->
<section id="contenido" style="padding-top:1px; padding-left: 20px;" >
<br>
<?php
ob_end_flush();
?>
