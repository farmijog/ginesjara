<?php
include('functionPAY.php');
include('conexionPAY.php');
abrir_conexion();//Abre la conexion a la base de datos

if (!empty($_REQUEST)) {
$product_no = $_REQUEST['item_number']; // ID del producto
$product_transaction = $_REQUEST['tx']; // ID de transacción Paypal
$product_price = $_REQUEST['amt']; // Monto recibido Paypal
$product_currency = $_REQUEST['cc']; // Moneda recibida de Paypal
$product_status = $_REQUEST['st']; // Estado del producto Paypal


$product_no = intval($product_no);
$data = array('product_id' => $product_no);
$query = Select_Record_By_One_Filter($data, 'respuestaorden');
$query->setFetchMode(PDO::FETCH_ASSOC);
$result = $query->fetch();
} else {
	header("location:mensajeCliente.php");
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Proceso de pago</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style2.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
<body style="background-image: url('img/imgblur.jpg');">
<form name="form"  class="form-horizontal" method="post" enctype="multipart/form-data" action="query_modestado.php">
<div class="row-fluid" id="products-columns">
		<!--<h1 class="text-center" style="color:white">Gracias por comprar nuestro producto</h1> --><br><br><br>
		
		<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-info">
		  <div class="panel-heading">
			<h4 class='text-center'>  Estado de pago</h4>
		  </div>
		  <div class="panel-body">
		  <?php 
			if ( $product_currency == $result['product_currency']) {
		  ?>
			<h3 class='text-success text-center'>Pago recibido exitosamente</h3>
			<p>Estado de la transaccion: <input type="text" style=" border: 0;color:green" readonly="readonly"  name="estadotrans" value="Completado"></p>
			<p>Id de transaccion: <input type="text" name="idtrans" style=" border: 0;color:blue" readonly="readonly" value="<?php echo $product_transaction;?>"></p>
			<p>Total pagado: <input type="text" style=" border: 0;color:blue" readonly="readonly" name="precio" value="<?php echo $product_price;?>" USD></p>
			<p></p>
			<p><input type="hidden" name="prodnum" value="<?php echo $product_no;?>"></p>
			<p><input type="hidden" name="usernum" value="<?php echo $result['userNumber'];?>"></p>
			<p class="text-center"><br>
				<button type="submit" class="btn btn-primary btn-lg">Regresar</button> 
			</p>
			<?php
			} else {
				?>
			<h3 class='text-danger text-center'>Pago falló</h3>
			<p>Estado de la transaccion: <input type="text" style=" border: 0;color:red" readonly="readonly"  name="estadotrans" value="No completado"></p>
			<p>Id de transaccion: <input type="text" name="idtrans" style=" border: 0;color:red" readonly="readonly" value="<?php echo $product_transaction;?>"></p>
			<p>Total pagado: <input type="text" style=" border: 0;color:red" readonly="readonly" name="precio" value="<?php echo $product_price;?>" USD></p>
			<p><input type="hidden" name="prodnum" value="<?php echo $product_no;?>"></p>	
			<p><input type="hidden" name="usernum" value="<?php echo $result['userNumber'];?>"></p>			
			<p class="text-center"><br>
				<button type="submit" class="btn btn-primary btn-lg">Regresar a pedidos</button> 
			</p>	
				<?php
			}
			?>	
		  </div>
		</div>
		
		</div>
		


	
</div>
</form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
<?php cerrar_conexion(); ?>