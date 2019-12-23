<?php
include('functionPAY.php');
include('conexionPAY.php');
abrir_conexion();
if (isset($_REQUEST['id'])){
	$product_id=base64_decode(($_REQUEST['id']));
	$product_id=intval($product_id);

	$data = array('product_id' => $product_id);
	$query = Select_Record_By_One_Filter($data, 'respuestaorden');
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$result = $query->fetch();
	$product_name = $result['nombrecoti'];
	$emailco = $result['emailcotizador'];
	$product_price = $result['preciototal'];
	$product_currency = $result['product_currency'];
	cerrar_conexion();
	
	
	//URL Paypal Modo pruebas.
	$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	//URL Paypal para Recibir pagos 
	//$paypal_url = 'https://www.paypal.com/cgi-bin/webscr'; 
    $merchant_email = 'joaquinobed123456@gmail.com';
	$product_pricetrans = ($product_price/660);
	$cancel_return = "http:/127.0.0.1/PROYECTO/mensajeCliente.php";
	$success_return = "http:/127.0.0.1/PROYECTO/success.php";
?>
<div style="margin-left: 40%"><img src="img/processing_animation.gif"/>
<form name="myform" action="<?php echo $paypal_url; ?>" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="cancel_return" value="<?php echo $cancel_return ?>">
<input type="hidden" name="return" value="<?php echo $success_return; ?>">
<input type="hidden" name="business" value="<?php echo $merchant_email; ?>">
<input type="hidden" name="lc" value="C2">
<input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
<input type="hidden" name="item_number" value="<?php echo $product_id; ?>">
<input type="hidden" name="amount" value="<?php echo $product_pricetrans; ?>">
<input type="hidden" name="currency_code" value="<?php echo $product_currency; ?>">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="0">
</form>
<script type="text/javascript">
document.myform.submit();
</script>
<?php	
	
} else {
	header("location:mensajeCliente.php");
	exit;
}
?>