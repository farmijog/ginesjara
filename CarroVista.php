<?php
include 'CarroClases.php';

$cart = new Cart;
 ?>

<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache">
 <?php include('./inc/header.php'); ?>

 <style>
    .container{padding: 20px;}
    input[type="number"]{width: 30%;}
    </style>
    <script>
    function updateCartItem(obj,id){
        $.get("CarroAccion.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Error al actualizar el carro');
            }
        });
    }
    </script>
	<link rel="stylesheet" href="css/Aaprueba.css" type="text/css">
    <div id="Main">
    <div id="WebPage">
    <div class="align">
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-107g{border-color:#9b9b9b;text-align:left}
.tg .tg-2fdn{border-color:#9b9b9b;text-align:left;vertical-align:top}
.tg .tg-r3hf{font-weight:bold;font-family:"Arial Black", Gadget, sans-serif !important;;background-color:#c0c0c0;color:#343434;border-color:#656565;text-align:center}
</style>
    <div class="container">
        <h1>Carro de Compra</h1><br>
        <table class="tg" style="border: 1px solid; border-radius: 5px" >
        <thead>
            <tr >
                <th style="font-weight: bold; text-align: center">Producto</th>
                <th style="font-weight: bold; text-align: center">Precio</th>
                <th style="font-weight: bold; text-align: center">Cantidad</th>
                <th style="font-weight: bold;">Subtotal</th>
                <th>&nbsp;</th>
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
                <td><?php echo '$'.$item["price"]. ''; ?></td>
                <td style=" text-align: center"><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                <td><?php echo '$'.$item["subtotal"].''; ?></td>
                <td>
                    <a href="CarroAccion.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('¿Desea Eliminar?')">Eliminar</a>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="5"><p>Carro Vacio</p></td>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td><a href="Productos.php" class="btn btn-warning">Seguir Comprando</a></td>
                <td colspan="2"></td>
                <?php if($cart->total_items() > 0){ ?>
                <td></td>
				<td class="text-center"><strong>Total <?php echo '$'.$cart->total().''; ?></strong>
			</td>
                <?php } ?>
            </tr>
<?php
include 'connection.php';

$sesion = isset($_SESSION['user_id_logged']);

$query = $ConexionBD->query("SELECT * FROM usuarios WHERE userNumber=".$sesion);
if($query == true){
	echo'
			<tr>
			<td><a  href="OrdenPago.php" class="btn btn-success" style="width:25px; height:15px">Pagar<i class="glyphicon glyphicon-menu-right"></i></a>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td><a href="OrdenDetalle.php" class="btn btn-success" style="width:70px; height:15px">Cotizar + Servicios<i class="glyphicon glyphicon-menu-right"></i></a>
			</td>
			</tr>	
	';
	}else{
		echo'
			<tr>
			<td  colspan="5" style="font-size:13px;text-align:center">Por favor registrese para poder hacer una orden dentro del sistema</a>
			</td>

			</tr>	
		';
		}
?>			

        </tfoot>
        </table>
    </div>





  </div>
</div>
</div>



 <?php include('./inc/footer.php'); ?>
 <?php include('./inc/script.php'); ?></body></html>
