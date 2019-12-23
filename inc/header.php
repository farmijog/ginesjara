<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache"><head>
    	<meta charset="utf-8">
	<meta name="google-site-verification" content="FfO3HAiJ5gS8XfcxD8Hc9vIju-TCQ52Y73r1dLpv9cs">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html">

	<title>TGJ-Tableros Gines Jara</title>

	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/home.css" type="text/css">
	<link rel="stylesheet" href="css/menu.css" type="text/css">
	<link rel="stylesheet" href="css/form.css" type="text/css">

		<link rel="shortcut icon" href="img/icons/ico.png" type="image/ico" />

	<link rel="stylesheet" href="css/jquery.carouFredSel-5.6.1.css" type="text/css">
	<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css">
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css">
	<link rel="stylesheet" href="css/jquery.tipsy.css" type="text/css">
	<link rel="stylesheet" href="css/ui.tabs.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/jquery.vanadium.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/jquery.messi.min.css" type="text/css" media="all">

	<link href="css/loginuwu.css" rel="stylesheet" type="text/css"/>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <script src="js/jquery.js" type="text/javascript"></script>
   <script src="jss/login1.js" type="text/javascript"></script>
   	<script src="js/jspdf.js"></script>
	<script src="js/jquery-2.1.3.js"></script>
	<script src="js/pdfFromHTML.js"></script>




	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700,400,600" rel="stylesheet" type="text/css">

	<link href="css/imprimir.css" rel="stylesheet" type="text/css" media="print">
	<link rel="manifest" href="/manifest.json">

	<script async="" src="https://www.google-analytics.com/analytics.js"></script><script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/api2/r20171115120512/recaptcha__es.js"></script><script type="text/javascript" src="https://www.rhona.cl/js/jquery.modernizr.js" defer=""></script>
	<script src="https://www.google.com/recaptcha/api.js?hl=es"></script>

<link rel="stylesheet" href="https://onesignal.com/sdks/OneSignalSDKStyles.css?v=f6167d99955e6358ecf2599d34a8514f"></head>

    <style>

    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
<body>
<noscript>
    &lt;div id="msg-noscript"&gt;
    �Su navegador no soporta Javascript!.. Active el uso de Javascript en su navegador para visualizar el sitio web.
    &lt;/div&gt;
</noscript>
<header id="Superior">
	<div id="Cabecera">





		<a><h1>TBJ-Tableros Gines Jara</h1></a>

		<section class="login">

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
				<div class="links">
				<label style="color:white">Bienvenido <a href="panelusuarios.php"><?php echo $listinfo['Nombres']; ?></a>
				<?php
     include("connection.php");
////hay que arreglar
     $Consulta = "SELECT count(userNumber) FROM respuestaorden WHERE emailcotizador='$usuario' and estado='0' ";
     $Buscar = $ConexionBD->query($Consulta);

     while ($Buscaaa = $Buscar->fetch_assoc())
     {				
				?>
				<a href="mensajeCliente.php"><img src="img/msn.png" width="18" height="10" border="0"></a> <span style="color:yellow;font-size:12px"><?php echo $Buscaaa['count(userNumber)']; ?></span>
				
   <?php
			}
			?>				
	
				</label>
						<a href="cerrarsesion.php"> Cerrar Sesion </a>
            <?php
            $_SESSION['user_id_logged'] = $listinfo['userNumber'];
             ?>

				</div>
        <br><br><br><br><br><br><br><br>
        <section class="CarroMenu">
        		<a href="CarroVista.php" style="font-size: 15px"class="cart-link" title="Ver Carro">Ver Carro</a>

        </section>

	<?php
	}
	}
	else
	{
	?>
					<div class="links">
				<a href="login.php">Iniciar Sesión&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="reg.php">Registro</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<BR>
					<center><a href="recuperarclave.php">Recuperar contrase&ntilde;a</a></center>
				</div>

	<?php
	}
?>
				<!--<form enctype="multipart/form-data" method="post" name="formRegistro" id="formRegistro" action="" class="formulario">
					<figure class="userIcon"><img src="css/images/ico-user.png"></figure>
					<input type="email" name="login_mail" id="login_mail" placeholder="E-mail" required="" class="usuario">
					<figure class="passIcon"><img src="css/images/ico-key.png"></figure>
					<input type="password" name="login_clave" id="login_clave" placeholder="Contrase&ntilde;a" maxlength="12" required="" class="password">
					<button type="submit" class="submit">Ingresar</button>
				</form>-->


		</section>

		<section class="menuCorporativo">
			<a href="nosotros.php">Empresa</a> |
<a href="contacto.php">Contacto</a>

		</section>




		<nav id="menuPrincipal">
			<a href="index.php" class="homeMenu" title="TGJ-Tableros">
				<img src="css/images/ico-home.png">
			</a>

			<ul id="menu">

            <li><a class="drop" href="" onClick="return false">Productos</a>
			<div class="dropdown_5columns">
<div class="col_4">
	                			<h2>Productos</h2>
			              </div><div class="col_1"><h3>&Aacute;rea de Productos</h3><ul><li>&nbsp;
						                    			<a href="Productos.php">Productos</a>
						                    		  </li></ul></div></div>

</li><li><a href="servicios.php">Servicios</a></li>


						                    		  

			</li></ul>



      <section class="CarroMenuxd">
        </section>











		</nav>
	</div>
</header>
