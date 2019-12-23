<?php

include 'connection.php';


include 'CarroClases.php';
$cart = new Cart;


if($cart->total_items() <= 0){
    header("Location: Productos.php");
}



$_SESSION['user_id_logged'];



$query = $ConexionBD->query("SELECT * FROM usuarios WHERE userNumber=".$_SESSION['user_id_logged']);
if($query != true){
	header("Location: Productos.php");
	}else{
$custRow = $query->fetch_assoc();
?>
<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache">
 <?php include('./inc/header.php'); ?>

 <style>
     .container{width: 100%;padding: 20px;}
     .table{width: 65%;float: left;}
     .shipAddr{width: 30%;float: left;margin-left: 30px;}
     .footBtn{width: 95%;float: left;}
     .orderBtn {float: right;}
     </style>

     <div id="Main">
     <div id="WebPage">
     <div class="align">

     <div class="container">
	      <div id="HTMLtoPDF" >
		  <img style="display: none" src="img/HEADERPDF.png" width="520" height="120"></img>
         <h1>Detalle Cotizacion</h1>
                    <?php
                    date_default_timezone_set("Chile/Continental");
                    ?>
             <table>
                <tr>
                    <td><p style="display: none">Hora: <?php echo date("H:i:s"); ?></p></td>
                    <td><p style="display: none">Fecha: <?php echo date("d/m/Y"); ?></p></td>
                </tr>
             </table>
         <table class="table" style="border:1px solid; border-radius: 5px;">
         <thead>
             <tr>
                 <th>Producto</th>
                 <th>Precio</th>
                 <th>Cantidad</th>
                 <th>Subtotal</th>
             </tr>
         </thead>
         <tbody>
             <?php
             if($cart->total_items() > 0){
                 //get cart items from session
                 $cartItems = $cart->contents();
                 foreach($cartItems as $item){
             ?>
             <tr>
                 <td><?php echo $item["name"]; ?></td>
                 <td><?php echo '$'.$item["price"].''; ?></td>
                 <td><?php echo $item["qty"]; ?></td>
                 <td><?php echo '$'.$item["subtotal"].''; ?></td>
             </tr>
             <?php } }else{ ?>
             <tr><td colspan="4"><p>No hay productos en el carro</p></td>
             <?php } ?>
         </tbody>
         <tfoot>
             <tr>
                 <td></td>
				 <td></td>
				 <td><strong>Precio Total</strong></td>
                 <?php if($cart->total_items() > 0){ ?>
                 <td class="text-center"><strong><?php echo '$'.$cart->total().''; ?></strong></td>
                 <?php } ?>
             </tr>
         </tfoot>
         </table>
         <div class="shipAddr">

             <p>Nombre:<?php echo $custRow['Nombres']; ?></p>
             <p>Apellido:<?php echo $custRow['ApPaterno']; ?></p>
             <p>Telefono:<?php echo $custRow['Telefono']; ?></p>
             <p>Email:<?php echo $custRow['Email']; ?></p>
         </div>
		 <?php
		 }?>
		 <img style="display: none" src="img/relleno.png" width="580" height="150"></img>
		 <img style="display: none" src="img/FOOOTERPDF.png" width="520" height="170"></img>
		 </div>
         <div class="footBtn">
             <!--<a href="Productos.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Seguir Comprando</a>--><br><br>
			 <label style="color:blue">Al precionar realizar pedido se le guardara un archivo PDF dando informacion de lo que usted comprara.</label><br>
             <a href="CarroAccion.php?action=placeOrder" onclick="HTMLtoPDF()" class="btn btn-success orderBtn">Realizar Pedido<i class="glyphicon glyphicon-menu-right"></i></a>
			  <!--<a href="#" onclick="HTMLtoPDF()" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Imprimir Cotizacion</a>-->
         </div>
     </div>








   </div>
 </div>
 </div>








 <?php include('./inc/footer.php'); ?>
 <?php include('./inc/script.php'); ?></body></html>
