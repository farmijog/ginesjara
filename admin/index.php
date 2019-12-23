<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/loginadmin.css">
<!--- Include the above in your HEAD tag ---------->
<?php
  require_once("sesion.class.php");

  $sesion = new sesion();

  if( isset($_POST["iniciar"]) )
  {

    $usuario = $_POST["email"];
    $password = md5($_POST["clave"]);

    if(validarUsuario($usuario,$password) == true)
    {
      $sesion->set("email",$usuario);

      header("location: principal.php");
    }
  }


  function validarUsuario($usuario, $password)
  {
    $conexion = new mysqli("localhost","root","","ginesbd");
    $consulta = "select Clave from usuarios where Email = '$usuario';";

    $result = $conexion->query($consulta);

    if($result->num_rows > 0)
    {
      $fila = $result->fetch_assoc();
      if( strcmp($password,$fila["Clave"]) == 0 )
        return true;
      else
        return false;
    }
    else
        return false;
  }

?>


<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--- Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Adminsitrador</h2>
   <p>Introduce los datos correspondientes</p>
   </div>
    <form id="Login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <div class="form-group">


            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña" name="clave">

        </div>
        <div class="forgot">
</div>
        <button type="submit" name="iniciar" class="btn btn-primary">Ingresar</button>

    </form>
    </div>
</div></div></div>


</body>
</html>
