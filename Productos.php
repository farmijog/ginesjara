<?php
include("connection.php");
 ?>

<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache">
   <?php include('./inc/header.php'); ?>


<style>
.container_accesorios{
  padding-left: 230px;
  width: 75%;

  align: right;
}

.col-md-3{
  display: inline-block;
}

.producto_acc{
width: 230px;
border: 1px solid #DCDADA;
margin: -1px 19px 3px -1px;
padding: 10px;
text-align: center;
background-color: #f1f1f1;
border-radius: 5px;

}

.producto:hover{
  border: 1px solid black;
}

.desc_pro{
   font-family: verdana;
   font-size: 12px;
   color: white;
   text-align: left;
   left: 0;
}

.demo-2 {
    position:relative;
    width:140px;
    height:180px;
    overflow:hidden;

    background-color: rgba(26,76,110,0.5)
}

.effect img {
    position:absolute;
    left:0;
    right: 0;
    bottom:0;
    cursor:pointer;
    -webkit-transition:bottom .2s ease-in-out;
    -moz-transition:bottom .2s ease-in-out;
    -o-transition:bottom .2s ease-in-out;
    transition:bottom .2s ease-in-out
}
.effect img.top:hover {
    bottom:-180px;
    padding-top:180px
}

</style>

<div id="Main">
<div id="WebPage">

	<div class="align">

    <!--<img id="imguwu" src="img/producto.png">-->

		<aside class="sidebarPage">

		    <h4>
		    	Catálogo de Productos »
		    </h4>
        <ul id="accordion" class="accordion">
          <li>
        <div class="open">Productos</div>

<ul id="4-29" style="display: block;">
  <?php
   $query = "SELECT * FROM categorias ORDER BY categoriaNombre";
   $result = mysqli_query($ConexionBD,$query);
   if (mysqli_num_rows($result) > 0) {
     while ($row = mysqli_fetch_array($result)) {

   ?>
   <a href="Productos.php?IDrequest=<?php echo $row['categoriaID']; ?>"><li><?php echo $row["categoriaNombre"]; ?></li></a>
   <?php
    }
   }
   ?>
   </ul>
 </li>
	</ul>
		</aside>

    <div class="container_accesorios"  >
<?php

$IDpro = isset($_REQUEST['IDrequest']) ? $_REQUEST['IDrequest'] : NULL;

include("connection.php");

$queryL2 = "SELECT * FROM categorias WHERE categoriaID='$IDpro'";
$result = mysqli_query($ConexionBD,$queryL2);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result)) {

?>
	<script type="text/javascript">$('#imguwu').hide()</script>
<h2><?php echo $row["categoriaNombre"]; ?></h2>
<br>
<?php
 }
}
?>
        <?php
      $query = "Select * From productos where categoriaID='$IDpro'";
      $result = mysqli_query($ConexionBD,$query);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

    ?>
         <div class="col-md-3">

             <div class="producto_acc">
               <a href="#"><?php $row ?></a>
               <h3 class="text-info" style="font-weight: bold;"><?php echo $row["productoNombre"]; ?></h3>
               <br>

               <center>
              <ul class="demo-2 effect">
                 <label class="desc_pro"><?php echo $row["productoDescripcion"]; ?></label><br>
                <?php
                if($row['productoImagen']!=""){
                  echo '<img class="top" src="data:image/jpeg;base64,'.base64_encode( $row['productoImagen'] ).'" height="180px" width="180px" />';

             }
             else{
              echo"<td><img src ='img/img_no_disponible.png' height='180px' width='180px'/></td>";
             }
                 ?>
              </ul>
            </center>
               <h4 style="color: black;" class="text-danger">Precio: $<?php echo $row["productoPrecio"] ?></h4>
               
			  <?php
                if($row['Estado']=="Disponible"){
                  echo '<a class="btn btn-success" href="CarroAccion.php?action=addToCart&id='.($row['productoCodigo']).'">Agregar al carro</a>';

             }
             else{
              echo "<a class='btn btn-primary' disabled>No disponible</a>";
             }
                 ?>
			   
             </div>
             <br>
         </div>

        <?php
         }
        }
         ?>
        </div>

    </div>

    </div>
    </div>
       <?php include('./inc/footer.php'); ?>
       <?php include('./inc/script.php'); ?></body></html>
