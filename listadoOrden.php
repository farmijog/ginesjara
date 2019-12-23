<?php
  session_start();
  include("connection.php");
  if (isset($_POST["add_to_cart"])) {

    if (isset($_SESSION["shopping_cart"])) {
      $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
      if (!in_array($_GET["productoCodigo"], $item_array_id)) {
        $count = count($_SESSION["shopping_cart"]);
        $item_array = array(
          'item_id' =>  $_GET["productoCodigo"],
          'item_name' =>  $_POST["hidden_name"],
          'item_price' => $_POST["hidden_price"],
          'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
      }
      else {
        echo '<script>alert("Producto ya agregado")</script>';
        echo '<script>window.location="Productos.php"</script>';
      }
    }
    else {
      $item_array = array(
        'item_id' =>  $_GET["productoCodigo"],
        'item_name' =>  $_POST["hidden_name"],
        'item_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][0] = $item_array;
    }
  }

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      if ($values["item_id"] == $_GET["productoCodigo"]) {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Producto borrado")</script>';
        echo '<script>window.location="listadoOrden.php"</script>';

      }
    }
  }
}

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
      <div ></div>
      <br>
      <h3>Detalle de Orden</h3>
      <div class="table-responsive">
        <table class="table table-bordered" style="border: 1px solid;">
        <tr>
          <th width="40%">Producto</th>
         <th width="10%">Cantidad</th>
         <th width="20%">Precio</th>
         <th width="15%">Total</th>
         <th width="5%">Accion</th>
        </tr>
        <?php
        if (!empty($_SESSION["shopping_cart"])) {
          $total = 0;
          foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            ?>
            <tr>
              <td><?php echo $values["item_name"]; ?></td>
              <td><?php echo $values["item_quantity"]; ?></td>
              <td>$ <?php echo $values["item_price"]; ?></td>
              <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"]); ?></td>
              <td><a href="listadoOrden.php?action=delete&productoCodigo=<?php echo $values["item_id"]; ?>"><span class="text-danger">Borrar</span></a></td>
            </tr>
            <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
             ?>
             <tr>
               <td colspan="3" align="right">Total</td>
               <td align="right">$ <?php echo number_format($total); ?></td>
               <td></td>
             </tr>
           <?php
          }
          ?>
        </table>

    </div>

<?php

$IDpro = isset($_REQUEST['IDrequest']) ? $_REQUEST['IDrequest'] : NULL;

include("connection.php");

$queryL2 = "SELECT * FROM categorias WHERE categoriaID='$IDpro'";
$result = mysqli_query($ConexionBD,$queryL2);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result)) {

?>

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
           <form class="" action="Productos.php?action=add&productoCodigo=<?php echo $row["productoCodigo"] ?>" method="post">
             <div class="producto_acc">
               <a href="#"><?php $row ?></a>
               <h3 class="text-info" style="font-weight: bold;"><?php echo $row["productoNombre"]; ?></h3>
               <br>

               <center>
              <ul class="demo-2 effect">
                 <label class="desc_pro"><?php echo $row["productoDescripcion"]; ?></label><br>
                <?php echo '<img class="top" src="data:image/jpeg;base64,'.base64_encode( $row['productoImagen'] ).'" height="180px" width="180px" />'; ?>
              </ul>
            </center>
               <input type="text" name="quantity" class="form-control" value="1">
               <h4 style="color: black;" class="text-danger">Precio: <?php echo $row["productoPrecio"] ?></h4>
               <input type="hidden" name="hidden_name" value="<?php echo $row["productoNombre"]; ?>">
               <input type="hidden" name="hidden_price" value="<?php echo $row["productoPrecio"]; ?>">
               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Agregar al Carro">
             </div>
           </form>
         </div>
        <?php
         }
        }
         ?>
        </div>











    </div>
    </div>
       <?php include('./inc/footer.php'); ?>
       <?php include('./inc/script.php'); ?></body></html>
