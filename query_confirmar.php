
<?php
	include('connection.php');

	include 'CarroClases.php';
	$cart = new Cart;
	
	$numerousuario = $_POST["usernumb"];
	$PrecioTotal = $_POST["pretotal"];
	$Currency = $_POST["txtCurrency"];
	$Coti = $_POST["txtcoti"];
    $Estado = $_POST["txtvalidad"];;
	$emailco = $_POST["email"];
	$idprod = $_POST["idprod"];
	$cantidad = $_POST["cantidad"];
	
    date_default_timezone_set("Chile/Continental");
					
	$Consulta = "insert into ordencomprada(userNumber,Preciototal,creada,estado,emailcomprador,product_currency,nombrecompra)values
('$numerousuario','$PrecioTotal','".date("Y-m-d H:i:s")."','$Estado','$emailco','$Currency','$Coti')";
	$Buscar = $ConexionBD -> query($Consulta);

	if($Buscar)
	{
			header("Location:metododepago.php");
			echo'test';
	}
	else
	{
		echo "Error: " . $Consulta . "<br>" . $ConexionBD->error;
	}
	///INSERTAR DATOS A TABLA ORDEN_CMPDIR
	////
	
	if( $cart->total_items() > 0 && !empty($_SESSION['user_id_logged'])){

        $insertOrder = $ConexionBD->query("INSERT INTO orden_cmpdir (userNumber, precio_total, creada, estado) VALUES ('".$_SESSION['user_id_logged']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."','0')");

        if($insertOrder){
            $orderID = $ConexionBD->insert_id;
            $sql = '';

            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO orden_itemscmpdir (id_orden, productoCodigo, cantidad) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
        
            $insertOrderItems = $ConexionBD->multi_query($sql);

            if($insertOrderItems){
                $cart->destroy();
                header("Location: metododepago.php");
            }else{
                return;
            }
        }else{
            return;
        }
    }

	
include 'CarroClases.php';
$cart = new Cart;

$cart->destroy();

?>

