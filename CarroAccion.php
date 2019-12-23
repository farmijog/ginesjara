<?php

include 'CarroClases.php';
$cart = new Cart;

date_default_timezone_set("Chile/Continental");

include 'connection.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];

        $query = $ConexionBD->query("SELECT * FROM productos WHERE productoCodigo='$productID'");
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['productoCodigo'],
            'name' => $row['productoNombre'],
            'price' => $row['productoPrecio'],
            'qty' => 1
        );

        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'CarroVista.php':'Productos.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: CarroVista.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['user_id_logged'])){

        $insertOrder = $ConexionBD->query("INSERT INTO orden (userNumber, precio_total, creada, modificada, valorservicio) VALUES ('".$_SESSION['user_id_logged']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."', '0')");

        if($insertOrder){
            $orderID = $ConexionBD->insert_id;
            $sql = '';

            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO orden_items (id_orden, productoCodigo, cantidad) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }

            $insertOrderItems = $ConexionBD->multi_query($sql);

            if($insertOrderItems){
                $cart->destroy();
                header("Location: OrdenExitosa.php?id=$orderID");
            }else{
                header("Location: OrdenDetalle.php");
            }
        }else{
            header("Location: OrdenDetalle.php");
        }
    }else{
        header("Location: Productos.php");
    }
}else{
    header("Location: Productos.php");
}
