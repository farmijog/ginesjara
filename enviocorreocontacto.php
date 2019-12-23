<?php
$remitente = $_POST['emailSolicitante'];
$destinatario = 'wikitareauwu@gmail.com';
$asunto = 'Sugerencia / Consulta'; 
if (!$_POST){
?>

<?php
}else{
	 
    $cuerpo = "Sr/a.: " . $_POST["nombreSolicitante"] . "\r\n"; 
    $cuerpo .= "Rut: " . $_POST["rut"] . "\r\n";
	$cuerpo .= "Email: " . $_POST["emailSolicitante"] . "\r\n";
	$cuerpo .= "Telefono: " . $_POST["telefono"] . "\r\n";
	$cuerpo .= "Direccion: " . $_POST["direccion"] . "," . $_POST["ciudad"] . "\r\n";
	$cuerpo .= "Empresa: " . $_POST["empresa-yo-razon-social"] . "\r\n";
	$cuerpo .= "Sugerencia / Consulta / Comentario: " . $_POST["sugerencia-consulta-comentario"] . "\r\n";


    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/plain; charset=utf-8\n";
    $headers .= "X-Priority: 3\n";
    $headers .= "X-MSMail-Priority: Normal\n";
    $headers .= "X-Mailer: php\n";
    $headers .= "From: \"".$_POST['nombreSolicitante']." - ".$_POST['rut']."\" <".$remitente.">\n";

    mail($destinatario, $asunto, $cuerpo, $headers);
    
}
?>